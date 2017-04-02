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
        if (count($users) > 4) {
            Session::flash('alert-danger', "Group cannot have more than 4 players");
            return redirect('/groups');
        } else {
            $group->save();
            for ($i = 0; $i < count($users); $i++ ) {
                $user = User::find($users[$i]);
                $group->users()->attach($user->id);
            }
            if (Auth::user()) {
                Session::flash('alert-success', "Group successfully created");
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

        $userids = $request->users;
        $totalUsers = count($userids) + $group->users()->count();
        if ($totalUsers > 4) {
            Session::flash('alert-danger', "Group cannot have more than 4 players");
            return redirect('/groups');
        } else {
            $group->save();
            for ($i = 0; $i < count($userids); $i++ ) {
                $user = User::find($userids[$i]);
                $group->users()->attach($user->id);
            }
            if (Auth::user()) {
                Session::flash('alert-success', "Group successfully created");
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
        Session::flash('alert-success', "Group deleted Successfully");
        return redirect('/groups');
    }
}