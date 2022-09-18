<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
class EducationPageController extends Controller
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
        $educations = Education::all();
        return view('pages.education.list', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.education.create');
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
            'degree'=> 'required | string',
            'location'=> 'required | string',
        ]);

        $education = new education;
        $education->year=$request->year;
        $education->institution=$request->institution;
        $education->department=$request->department;
        $education->degree=$request->degree;
        $education->location=$request->location;

        $education->save();

        return redirect()->route('admin.education.list')->with('success', 'New Education Detail created successfully');
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
        $education = Education::find($id);
        return view('pages.education.edit', compact('education'));
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
            'degree'=> 'required | string',
            'location'=> 'required | string',
        ]);

        $education = Education::find($id);
        $education->year=$request->year;
        $education->institution=$request->institution;
        $education->department=$request->department;
        $education->degree=$request->degree;
        $education->location=$request->location;

        $education->save();

        return redirect()->route('admin.education.list')->with('success', 'Education Detail Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::find($id);
        $education->delete();
        
        return redirect()->route('admin.education.list')->with('success', 'Education deleted successfully');
    }
}
