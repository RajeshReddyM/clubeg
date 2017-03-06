<?php

namespace App\Http\Controllers;

use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;

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
     * Controller function which returns the basic view with tournament data which the user requests
     * TODO: Once all tables are complete - restrict the query to only grab tournaments available to this user
    */
    public function index()
    {
        $tournaments = DB::table('tournaments')->get();
        return view('tournaments/index')->with('tournaments', $tournaments);
    }

    /*Created: 2017-02-16 - Michel Tremblay
     * Controller function which handles the page request to create a new tournament
    */
    public function create()
    {
        $tournament = new Tournament;

        return view('users/create')->with(compact('tournament'));
    }

    /*Created: 2017-02-16 - Michel Tremblay
     * Controller function which returns the basic view with tournament data which the user requests
    */
    public function view($tournamentId)
    {
        //grab the required tournament
        //TODO: Create a way to get a list of players for a tournament  { Users - Tournaments table }
        $tournamentInfo =  DB::table('tournaments')->where('id', $tournamentId)->first();
        $courseInfo = DB::table('golfcourses')->where('id', $tournamentInfo->golfcourse_id)->first();

        $clubInfo = DB::table('golfclubs')->where('id', $courseInfo->golfclub_id)->first();


        $pageData = array(
            'tournamentInfo' =>$tournamentInfo,
            'courseInfo' => $courseInfo,
            'clubInfo' =>$clubInfo
        );
        return view('tournaments/register')->with('pageData', $pageData);
    }


    /*Created: 2017-02-16 - Michel Tremblay
    * Controller function which registers the user for the selected tournament
    * TODO: Add functionality to register the current user in a tournament. This function should check if the user has access to the tournament before registering
   */
    public function register($tournamentInfo)
    {
        return view('tournaments/register');
    }
}
