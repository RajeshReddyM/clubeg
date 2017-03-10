<?php

namespace App\Http\Controllers;

use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\Http\Requests;

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

        return view('tournaments/create')->with(compact('tournament'));
    }





    /*Created: 2017-03-07 - Michel Tremblay
     * Controller function which saves new tournament data to db
    */
    public function store(Request $request)
    {
        $filename = $request->logo->getClientOriginalName();
        $path = $request->logo->storeAs('tournaments', $filename);
        $tournament = new Tournament();
        $tournament->name = $request->name;
        $tournament->golfcourse_id = $request->golfcourse_id;
        $tournament->start_time = $request->start_time;
        $tournament->logo = $filename;
        $tournament->save();


        if (Auth::user()) {
            Session::flash('alert-success', 'Successfully created golfcourse');
            return redirect('/tournaments');
        }
    }

    /*Created: 2017-02-16 - Michel Tremblay
     * Controller function which returns the basic view with tournament data which the user requests
     * TODO: This function should check if the user has access to the tournament before viewing
    */
    public function view($tournamentId)
    {
        $user = Auth::user();
        //grab the required tournament and course info
        $tournamentInfo =  DB::table('tournaments')->where('id', $tournamentId)->first();
        $courseInfo = DB::table('golfcourses')->where('id', $tournamentInfo->golfcourse_id)->first();
        $clubInfo = DB::table('golfclubs')->where('id', $courseInfo->golfclub_id)->first();

        //determine if the user is registered for the requested tournament
        $registered = false;
        if(DB::table('tournament_user')->where('user_id', $user->id)->where('tournament_id', $tournamentId)->exists()){
            $registered = true;
        }

        //package all the content
        $pageData = array(
            'tournamentInfo' =>$tournamentInfo,
            'courseInfo' => $courseInfo,
            'clubInfo' =>$clubInfo,
            'isRegistered' => $registered
        );
        return view('tournaments/register')->with('pageData', $pageData);
    }


    /*Created: 2017-02-16 - Michel Tremblay
    * Controller function which registers the user for the selected tournament
    * TODO: This function should check if the user has access to the tournament before registering
   */
    public function register($tournamentId)
    {
        $user = Auth::user();
        //grab the required tournament and course info
        $tournamentInfo =  DB::table('tournaments')->where('id', $tournamentId)->first();
        $courseInfo = DB::table('golfcourses')->where('id', $tournamentInfo->golfcourse_id)->first();
        $clubInfo = DB::table('golfclubs')->where('id', $courseInfo->golfclub_id)->first();

        //determine if the user is registered for the requested tournament
        $registered = false;
        if(DB::table('tournament_user')->insert(['user_id' => $user->id, 'tournament_id' => $tournamentId, 'created_at' =>date("y-m-d")])){
            $registered = true;
            Session::flash('alert-success', "You've been registered!");
        } else {
            Session::flash('alert-danger', 'Registration failed. Please try again.');
        }

        //package all the content
        $pageData = array(
            'tournamentInfo' =>$tournamentInfo,
            'courseInfo' => $courseInfo,
            'clubInfo' =>$clubInfo,
            'isRegistered' => $registered
        );
        return view('tournaments/register')->with('pageData', $pageData);
    }

    /*Created: 2017-03-07 - Michel Tremblay
       * Controller function which cancels a registration for the current user and the designated tournament
    */
    public function cancelRegistration($tournamentId)
    {
        $user = Auth::user();
        //grab the required tournament and course info
        $tournamentInfo =  DB::table('tournaments')->where('id', $tournamentId)->first();
        $courseInfo = DB::table('golfcourses')->where('id', $tournamentInfo->golfcourse_id)->first();
        $clubInfo = DB::table('golfclubs')->where('id', $courseInfo->golfclub_id)->first();

        //determine if the user is registered for the requested tournament
        $registered = true;
        if(DB::table('tournament_user')->where('user_id', $user->id)->where('tournament_id', $tournamentId)->delete()) {
            $registered = false;
            Session::flash('alert-success', 'Registration cancelled.');
        } else {
            Session::flash('alert-danger', 'Cancellation failed. Please try again.');
        }
        //package all the content
        $pageData = array(
            'tournamentInfo' =>$tournamentInfo,
            'courseInfo' => $courseInfo,
            'clubInfo' =>$clubInfo,
            'isRegistered' => $registered
        );

        return view('tournaments/register')->with('pageData', $pageData);
    }
}
