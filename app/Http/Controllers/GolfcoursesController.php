<?php

namespace App\Http\Controllers;

use App\Golfcourse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class GolfcoursesController extends Controller
{
    public function index()
    {
        $golfcourses = Golfcourse::all();

        return view('golfcourses.index')->with('golfcourses', $golfcourses);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $golfcourse = new Golfcourse;

        return view('golfcourses.create')->with(compact('golfcourse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $filename = $request->logo->getClientOriginalName();
        $path = $request->logo->storeAs('golfcourses', $filename);
        $golfcourse = new Golfcourse();
        $golfcourse->name = $request->name;
        $golfcourse->hole_no = (int)$request->hole_no;
        $golfcourse->par = $request->par;
        $golfcourse->hole_length = $request->hole_length;
        $golfcourse->golfclub_id = $request->golfclub_id;
        $golfcourse->logo = $filename;
        $golfcourse->save();


        if (Auth::user()) {
            Session::flash('alert-success', trans('golf_courses.create_golfcourse'));
            return redirect('/golfcourses');
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
        // get the Golfcourse
        $golfcourse = Golfcourse::find($id);

        // show the edit form and pass the Golfcourse
        return view('golfcourses.edit')->with('golfcourse', $golfcourse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the Golfcourse
        $golfcourse = Golfcourse::find($id);

        // show the edit form and pass the golfcourse
        return view('golfcourses.show', ['golfcourse' => $golfcourse]);
    }

    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id)
    {
        $golfcourse = Golfcourse::findOrFail($id);
        $request = request();
        $golfcourse->name = $request->name;
        $golfcourse->hole_no = (int)$request->hole_no;
        $golfcourse->par = $request->par;
        $golfcourse->hole_length = $request->hole_length;
        $golfcourse->golfclub_id = $request->golfclub_id;
        if ($request->logo) {
            $filename = $request->logo->getClientOriginalName();
            $path = $request->logo->storeAs('golfcourses', $filename);
            $golfcourse->logo = $filename;
        }
        $golfcourse->save();

        Session::flash('alert-success', trans('golf_courses.update_golfcourse'));
        return redirect('/golfcourses');
    }

     /**
     * Destroy the resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        $golfcourses = Golfcourse::findOrFail($id);
        $golfcourses->delete();
        Session::flash('alert-success', trans('golf_courses.delete_golfcourse'));
        return redirect('/golfcourses');
    }
}
