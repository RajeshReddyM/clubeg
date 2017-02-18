<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Requests\CreatePlayerRequest;
use App\Http\Requests;
use Bouncer;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('users.index')->with('users', $users);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $user = new User;

        return view('users.create')->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreatePlayerRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $user = User::create($request->all());
        if ($request->roles) {
            $roles = $request->roles;
            for ($i = 0; $i < count($roles); $i++ ) {
                $user->assign($roles[$i]);
            }
        }

        if (Auth::user()) {
            Session::flash('alert-success', trans('app.player_added_msg'));
            return redirect('/users');
        } else {
            $user->assign('guest');
            Session::flash('alert-success', trans('app.user_added_msg'));
            return redirect('/');
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
        // get the user
        $user = User::find($id);

        // show the edit form and pass the user
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id)
    {
        $this->validate(request(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);
        $user = User::findOrFail($id);
        $user->fill(request()->all());
        $user->deleteRoles();
        $user->assignRoles(request()->roles);
        $user->save();
        Session::flash('alert-success', trans('app.player_updated_msg'));
        return redirect('/users');
    }

     /**
     * Destroy the resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        Session::flash('alert-success', trans('app.player_deleted_msg'));
        return redirect('/users');
    }
}