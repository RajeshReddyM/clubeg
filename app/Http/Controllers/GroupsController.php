<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Requests;
use Bouncer;
use Debugbar;

class GroupsController extends Controller
{

    public function index()
    {
        $groups = Group::all();

        return view('groups.index')->with('groups', $groups);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $group = new Group;

        return view('groups.create')->with(compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $group = new Group();
        $group->name = $request->name;

        $users = $request->users;
        $tournaments = $request->tournaments;

        if (count($users) > 4) {
            Session::flash('alert-danger', trans('groups.not_more_players'));
            return redirect('/groups');
        } else {
            $group->save();
            $group->assignUsers($users);
            $group->assignTournaments($tournaments);
            if (Auth::user()) {
                Session::flash('alert-success', trans('groups.group_success_create'));
                return redirect('/groups');
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
        // get the group
        $group = Group::find($id);
        $users = User::all();

        // show the edit form and pass the group
        return view('groups.edit', ['group' => $group, 'users' => $users]);
    }

    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id)
    {
        $group = Group::findOrFail($id);
        $request = request();

        $group->name = $request->name;

        $users = $request->users;
        $tournaments = $request->tournaments;
        $totalUsers = count($users);
        if ($totalUsers > 4) {
            Session::flash('alert-danger', trans('groups.not_more_players'));
            return redirect('/groups');
        } else {
            $group->save();
            $group->deleteUsers();
            $group->assignUsers($users);
            $group->deleteTournaments();
            $group->tournaments()->attach($tournaments);

            if (Auth::user()) {
                Session::flash('alert-success', trans('groups.group_success_update'));
                return redirect('/groups');
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
        $group = Group::findOrFail($id);
        $group->delete();
        Session::flash('alert-success', trans('groups.group_success_delete'));
        return redirect('/groups');
    }
}