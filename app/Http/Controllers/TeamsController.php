<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Requests;
use Bouncer;

class TeamsController extends Controller
{

    public function index()
    {
        $teams = Team::all();

        return view('teams.index')->with('teams', $teams);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $team = new Team;

        return view('teams.create')->with(compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $team = new Team();
        $team->name = $request->name;

        $users = $request->users;

        if (count($users) > 4) {
            Session::flash('alert-danger', "Team cannot have more than 4 players");
            return redirect('/teams');
        } else {
            $team->save();
            for ($i = 0; $i < count($users); $i++ ) {
                $user = User::find($users[$i]);
                $team->users()->attach($user->id);
            }
            if (Auth::user()) {
                Session::flash('alert-success', "Team successfully created");
                return redirect('/teams');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the Team
        $team = Team::find($id);
        $users = User::all();

        // show the edit form and pass the Team
        return view('teams.edit', ['team' => $team, 'users' => $users]);
    }

    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id)
    {
        $team = Team::findOrFail($id);
        $request = request();
        $team->name = $request->name;

        $users = $request->users;
        $totalUsers = count($users);
        if ($totalUsers > 4) {
            Session::flash('alert-danger', "Team cannot have more than 4 players");
            return redirect('/teams');
        } else {
            $team->save();
            $team->deleteUsers();
            $team->assignUsers($users);
            if (Auth::user()) {
                Session::flash('alert-success', "Team Updated Successfully");
                return redirect('/teams');
            }
        }
    }

     /**
     * Destroy the resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        Session::flash('alert-success', "Team deleted Successfully");
        return redirect('/teams');
    }
}