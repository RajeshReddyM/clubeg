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
        $club->postal_code = $request->postal_code;
        $club->logo = $filename;
        $club->save();


        if (Auth::user()) {
            Session::flash('alert-success', trans('golf_club.create_golfclub'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the golfclub
        $club = Golfclub::find($id);
        // get golfcourses associated with this club
        $golfcourses = $club->golfcourses;
        $user = Auth::user();
        // check if user is registered
        $registered = $club->users()->wherePivot('user_id', $user->id)->exists();

        // show the edit form and pass the golfclub and associated golfcourses
        return view('golfclubs.show', ['club' => $club, 'golfcourses' => $golfcourses, 'registered' => $registered]);
    }

    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id)
    {
        $club = Golfclub::findOrFail($id);
        $request = request();
        $club->name = $request->name;
        $club->street_no = $request->street_no;
        $club->street_name = $request->street_name;
        $club->city =  $request->city;
        $club->province = $request->province;
        $club->postal_code = $request->postal_code;
        if ($request->logo) {
            $filename = $request->logo->getClientOriginalName();
            $path = $request->logo->storeAs('clubs', $filename);
            $club->logo = $filename;
        }
        $club->save();

        Session::flash('alert-success', trans('golf_club.update_golfclub'));
        return redirect('/clubs');

    }


    public function register($id)
    {
        $club = Golfclub::findOrFail($id);
        $golfcourses = $club->golfcourses;
        $user = Auth::user();
        $club->users()->attach($user->id);
        // check if user is registered
        $registered = $club->users()->wherePivot('user_id', $user->id)->exists();

        Session::flash('alert-success', 'You have been Successfully Registered');
        return view('golfclubs/show', ['club' => $club, 'golfcourses' => $golfcourses, 'registered' => $registered]);
    }

    public function unregister($id)
    {
        $club = Golfclub::findOrFail($id);
        $golfcourses = $club->golfcourses;
        $user = Auth::user();
        $club->users()->detach($user->id);
        // check if user is registered
        $registered = $club->users()->wherePivot('user_id', $user->id)->exists();

        Session::flash('alert-success', 'You have been Unregistered Successfully');
        return view('golfclubs/show', ['club' => $club, 'golfcourses' => $golfcourses, 'registered' => $registered]);
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
        Session::flash('alert-success', trans('golf_club.delete_golfclub'));
        return redirect('/clubs');
    }
}
