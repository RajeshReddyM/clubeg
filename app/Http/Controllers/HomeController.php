<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
    public function index()
    {
        //get all tournaments from the db
        //TODO: make this grab all tournaments a user is registered for - 2017-03-06 - MT
        $tournaments = DB::table('tournaments')->get();

        return view('home')->with('tournaments', $tournaments);
    }
}
