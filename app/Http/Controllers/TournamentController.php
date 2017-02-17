<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    /*Created by Michel Tremblay - 2017-02-17
     * Use: returns tournament view with the user selected tournament data
     *TODO: Add logic to fetch and return tournament data to the view
    */
    public function view()
    {
        return view('tournamentRegistration');
    }


    /*Created by Michel Tremblay - 2017-02-17
     * Use: returns tournament view with the user selected tournament data
     *TODO: Add logic to fetch and return tournament data to the view
     *TODO: Add user to table of registrants of this tournament
    */
    public function register()
    {
        return view('tournamentRegistration');
    }
}
