<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
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
        //get ALL tournaments from the db
        $allTournaments = DB::table('tournaments')->get();

        //get tournaments where the current user is registered
        $user = Auth::user();
        $registeredTournamentIds = DB::table('tournament_user')->where('user_id', $user->id)->get();
        $registeredTournaments = [];
        foreach($registeredTournamentIds as $tournament){
            $nextTournament = DB::table('tournaments')->where('id', $tournament->tournament_id)->first();
            $registeredTournaments[] = $nextTournament;
        }



        $pageData = array(
            'allTournaments' => $allTournaments,
            'registeredTournaments' => $registeredTournaments
        );
        return view('home')->with('pageData', $pageData);


    }
}
