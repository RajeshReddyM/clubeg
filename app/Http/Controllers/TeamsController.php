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
        $tournaments = $request->tournaments;

        if (count($users) > 4) {
            Session::flash('alert-danger', trans('teams.no_more_than_4_players'));
            return redirect('/teams');
        } else {
            $team->save();
            $team->assignUsers($users);
            $team->assignTournaments($tournaments);

            if (Auth::user()) {
                Session::flash('alert-success', trans('teams.team_success_create'));
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
        $tournaments = $request->tournaments;
        $totalUsers = count($users);
        if ($totalUsers > 4) {
            Session::flash('alert-danger', trans('teams.no_more_than_4_players'));
            return redirect('/teams');
        } else {
            $team->save();
            $team->deleteUsers();
            $team->assignUsers($users);
            $team->deleteTournaments();
            $team->assignTournaments($tournaments);
            if (Auth::user()) {
                Session::flash('alert-success', trans('teams.team_success_update'));
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
        Session::flash('alert-success', trans('teams.team_success_delete'));
        return redirect('/teams');
    }
}