<?php

namespace App\Http\Controllers;

use App\Golfclub;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class GolfclubsController extends Controller
{
    public function index()
    {
        $clubs = Golfclub::all();

        return view('golfclubs.index')->with('clubs', $clubs);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $club = new Golfclub;

        return view('golfclubs.create')->with(compact('club'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    	$filename = $request->logo->getClientOriginalName();
    	$path = $request->logo->storeAs('clubs', $filename);
        $club = new Golfclub();
        $club->name = $request->name;
        $club->street_no = $request->street_no;
        $club->street_name = $request->street_name;
        $club->city =  $request->city;
        $club->province = $request->province;
        $club->logo = $filename;
        $club->save();


        if (Auth::user()) {
            Session::flash('alert-success', 'Successfully created golfclub');
            return redirect('/clubs');
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
        // get the golfclub
        $club = Golfclub::find($id);

        // show the edit form and pass the golfclub
        return view('golfclubs.edit')->with('club', $club);
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

     /**
     * Destroy the resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        $club = Golfclub::findOrFail($id);
        $club->delete();
        Session::flash('alert-success', trans('app.player_deleted_msg'));
        return redirect('/clubs');
    }
}
