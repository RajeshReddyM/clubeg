<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\Golfclub;
use App\Golfcourse;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Requests;

class TournamentsController extends Controller
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
        $tournaments = Tournament::all();
        return view('tournaments.index')->with('tournaments', $tournaments);
    }

    /*Created: 2017-02-16 - Michel Tremblay
     * Controller function which handles the page request to create a new tournament
    */
    public function create()
    {
        $tournament = new Tournament;

        return view('tournaments.create')->with(compact('tournament'));
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
        $tournament->start_date = $request->start_date;
        $tournament->logo = $filename;
        $tournament->save();


        if (Auth::user()) {
            Session::flash('alert-success', trans('tournaments.create_tournament'));
            return redirect('/tournaments');
        }
    }

    /*Created: 2017-02-16 - Michel Tremblay
     * Controller function which returns the basic view with tournament data which the user requests
     * TODO: This function should check if the user has access to the tournament before viewing
    */
    public function show($id)
    {
        $user = Auth::user();
        //grab the required tournament and course info
        $tournament =  Tournament::find($id);
        // $club = Golfclub::find($id);
        $golfcourse = Golfcourse::where('id', $tournament->golfcourse_id)->first();
        $club = Golfclub::where('id', $golfcourse->golfclub_id)->first();

        //determine if the user is registered for the requested tournament
        $registered = $tournament->users()->wherePivot('user_id', $user->id)->exists();

        //package all the content
        $pageData = array(
            'tournament' =>$tournament,
            'golfcourse' => $golfcourse,
            'club' =>$club,
            'isRegistered' => $registered
        );
        return view('tournaments.show')->with('pageData', $pageData);
    }


    /*Created: 2017-02-16 - Michel Tremblay
    * Controller function which registers the user for the selected tournament
    * TODO: This function should check if the user has access to the tournament before registering
   */
    public function register($id)
    {
        $user = Auth::user();
        //grab the required tournament and course info
        $tournament =  Tournament::where('id', $id)->first();
        $golfcourse = Golfcourse::where('id', $tournament->golfcourse_id)->first();
        $club = Golfcourse::where('id', $golfcourse->golfclub_id)->first();
        $tournament->users()->attach($user->id);
        //determine if the user is registered for the requested tournament
        $registered = $tournament->users()->wherePivot('user_id', $user->id)->exists();

        Session::flash('alert-success', trans('tournaments.registration_done'));

        //package all the content
        $pageData = array(
            'tournament' =>$tournament,
            'golfcourse' => $golfcourse,
            'club' =>$club,
            'isRegistered' => $registered
        );
        return view('tournaments.show')->with('pageData', $pageData);
    }

    /*Created: 2017-03-07 - Michel Tremblay
       * Controller function which cancels a registration for the current user and the designated tournament
    */
    public function unregister($id)
    {
        $user = Auth::user();
        //grab the required tournament and course info
        $tournament =  Tournament::where('id', $id)->first();
        $golfcourse = Golfcourse::where('id', $tournament->golfcourse_id)->first();
        $club = Golfclub::where('id', $golfcourse->golfclub_id)->first();
        $tournament->users()->detach($user->id);

        //determine if the user is registered for the requested tournament
        $registered = $tournament->users()->wherePivot('user_id', $user->id)->exists();

        Session::flash('alert-success', trans('tournaments.registration_cancelled'));

        //package all the content
        $pageData = array(
            'tournament' =>$tournament,
            'golfcourse' => $golfcourse,
            'club' =>$club,
            'isRegistered' => $registered
        );

        return view('tournaments.show')->with('pageData', $pageData);
    }
}
