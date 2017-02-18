<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Form;
class ProfileController extends Controller
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

    /*Created: 2017-02-16 - Michel Tremblay
     * Controller function which returns the basic view with profile data for the current user
     * TODO: Add functionality to fetch and return available tournaments for this user
    */
    public function view()
    {
        $user = Auth::user();
        if ($user) {
            $availableTournaments = ['Select...','Tournament 1', 'Tournament 2', 'Tournament 3', 'Tournament 4'];
            return view('profile')->with(compact('user'))
                ->with(compact('availableTournaments'));
        } else {
            return view('profile');
        }

    }


    /*Created: 2017-02-16 - Michel Tremblay
    * Controller function which registers the user for the selected tournament
    * TODO: Add functionality to fetch and return tournament data
   */
    public function postScore()
    {
        return view('postscore');
    }
}
