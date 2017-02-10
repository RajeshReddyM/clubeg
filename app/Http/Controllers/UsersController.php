<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Http\Requests\CreatePlayerRequest;


class UsersController extends Controller
{
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

        Session::flash('alert-success', 'Player added successfully');

        return redirect('/home');
    }
}