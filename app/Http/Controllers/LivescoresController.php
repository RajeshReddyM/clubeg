<?php

namespace App\Http\Controllers;

use App\Livescore;
use App\Tournament;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Requests;

class LivescoresController extends Controller
{

    public function index()
    {
        $scores = Livescore::all();

        return view('scores.index', ['scores' => $scores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $score = new Livescore;

        return view('scores.create')->with(compact('score'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $score = new Livescore();
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the Score
        $score = Livescore::find($id);
        $users = User::all();

        // show the edit form and pass the Score
        return view('scores.edit', ['score' => $core, 'users' => $users]);
    }

    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id)
    {
        
    }

    public function listscores($id)
    {

    }
     /**
     * Destroy the resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        $score = Livescore::findOrFail($id);
        $score->delete();
        Session::flash('alert-success', "Score Deleted Successfully");
        return redirect('/scores');
    }
}