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

    /*Created: 2017-02-16 - Michel Tremblay
     *Updated - 2017-02-17 - Michel Tremblay
     ***returning array of placeholder tournament information
     * Controller function which returns the basic view with tournament data which the user requests
     * TODO: Add functionality to fetch and return tournament data
    */
    public function view()
    {
        $tournamentInfo = ['start_date'=>'2017-02-27', 'golf_club_name'=>'Candy Land', 'golf_course_name'=>'Free Labour Range','tournament_type'=>'Private'];
        return view('tournamentRegistration')->with(compact('tournamentInfo'));
    }


    /*Created: 2017-02-16 - Michel Tremblay
    * Controller function which registers the user for the selected tournament
    * TODO: Add functionality to fetch and return tournament data
   */
    public function register()
    {
        return view('tournamentRegistration');
    }
}
