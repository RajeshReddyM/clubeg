<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Requests;

class SponsorsController extends Controller
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

    /*Created: 2017-04-09 - Michel Tremblay
     * Controller function which returns the basic view with sponsor data which the user requests
    */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('sponsors.index')->with('sponsors', $sponsors);
    }

    /*Created: 2017-04-09 - Michel Tremblay
     * Controller function which handles the page request to create a new sponsor
    */
    public function create()
    {
        $sponsor = new Sponsor;

        return view('sponsors.create')->with(compact('sponsor'));
    }

    /*Created: 2017-04-09 - Michel Tremblay
     * Controller function which saves new sponsor data to db
    */
    public function store(Request $request)
    {
        $filename = $request->logo->getClientOriginalName();
        $path = $request->logo->storeAs('sponsors', $filename);
        $sponsor = new Sponsor();
        $sponsor->name = $request->name;
        $sponsor->email = $request->email;
        $sponsor->logo = $filename;
        $sponsor->save();


        if (Auth::user()) {
            Session::flash('alert-success', trans('sponsors.create_sponsor'));
            return redirect('/sponsors');
        }
    }

    /*Created: 2017-04-09 - Michel Tremblay
     * Controller function which returns the basic view with sponsor data which the user requests
    */
    public function show($id)
    {
        $user = Auth::user();
        //grab the required sponsor and course info
        $sponsor =  Sponsor::find($id);

        //package all the content

        return view('sponsors.show')->with('sponsor', $sponsor);
    }





    /*Created: 2017-04-09 - Michel Tremblay
     * Controller function which returns the basic view with requested sponsor data
    */
    public function edit($id)
    {
        // get the Sponsor
        $sponsor = Sponsor::find($id);

        // show the edit form and pass the Sponsor
        return view('sponsors.edit')->with('sponsor', $sponsor);
    }


    /*Created: 2017-04-09 - Michel Tremblay
     * Controller function which accepts the updated sponsor data for saving
    */
    public function update($id)
    {
        $request = request();
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->name = $request->name;
        $sponsor->email = $request->email;
        if ($request->logo) {
            $filename = $request->logo->getClientOriginalName();
            $path = $request->logo->storeAs('sponsors', $filename);
            $sponsor->logo = $filename;
        }
        $sponsor->save();

        Session::flash('alert-success', trans('sponsors.update_sponsor'));
        return redirect('/sponsors');
    }
    /*Created: 2017-04-10 - Michel Tremblay
     * Controller function which deletes the selected sponsor
    */
    public function destroy($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        if($sponsor->delete()){
            Session::flash('alert-success', trans('sponsors.delete_sponsor'));
        } else {
            Session::flash('alert-danger', trans('sponsors.delete_sponsor'));
        }


        return redirect('/sponsors');
    }

}
