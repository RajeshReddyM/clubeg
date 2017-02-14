<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Session;
use App\Http\Requests\CreatePlayerRequest;


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
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->all());

        if (Auth::user()) {
            Session::flash('alert-success', trans('app.player_added_msg'));
            return redirect('/home');
        } else {
            Session::flash('alert-success', trans('app.user_added_msg'));
            return redirect('/');
        }
    }
}