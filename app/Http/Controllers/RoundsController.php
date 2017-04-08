<?php

namespace App\Http\Controllers;

use App\Round;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Requests;

class RoundsController extends Controller
{

    public function index()
    {
        $rounds = Round::all();

        return view('rounds.index')->with('rounds', $rounds);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $round = new Round;

        return view('rounds.create')->with(compact('round'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $round = new Round();
        $round->name = $request->name;
        $round->tournament_id = $request->tournament_id;
        $round->save();
        if (Auth::user()) {
            Session::flash('alert-success', 'Round Created Successfully');
            return redirect('/rounds');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the Round
        $round = Round::find($id);

        // show the edit form and pass the Round
        return view('rounds.edit', ['round' => $round]);
    }

    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id)
    {
        $round = Round::findOrFail($id);
        $request = request();
        $round->name = $request->name;
        $round->tournament_id = $request->tournament_id;
        $round->save();
        if (Auth::user()) {
            Session::flash('alert-success', "Round Updated Successfully");
            return redirect('/rounds');
        }
    }

     /**
     * Destroy the resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        $round = Round::findOrFail($id);
        $round->delete();
        Session::flash('alert-success', "Round deleted Successfully");
        return redirect('/rounds');
    }
}