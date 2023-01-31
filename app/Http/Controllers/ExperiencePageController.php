<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
class ExperiencePageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $experiences = Experience::all();
        return view('pages.experience.list', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'year'=> 'required | string',
            'institution'=> 'required | string',
            'department'=> 'required | string',
            'description'=> 'required | string',
            'location'=> 'required | string',
        ]);

        $experience = new experience;
        $experience->year=$request->year;
        $experience->institution=$request->institution;
        $experience->department=$request->department;
        $experience->description=$request->description;
        $experience->location=$request->location;

        $experience->save();

        return redirect()->route('admin.experience.list')->with('success', 'New Experience Detail created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experience = Experience::find($id);
        return view('pages.experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'year'=> 'required | string',
            'institution'=> 'required | string',
            'department'=> 'required | string',
            'description'=> 'required | string',
            'location'=> 'required | string',
        ]);

        $experience = Experience::find($id);
        $experience->year=$request->year;
        $experience->institution=$request->institution;
        $experience->department=$request->department;
        $experience->description=$request->description;
        $experience->location=$request->location;

        $experience->save();

        return redirect()->route('admin.experience.list')->with('success', 'Experience Detail Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        
        return redirect()->route('admin.experience.list')->with('success', 'Experience deleted successfully');
    }
}
