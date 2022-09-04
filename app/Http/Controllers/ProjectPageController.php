<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $projects = Project::all();
        return view('pages.project.list', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.project.create');
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
            'icon'=> 'required | string',
            'title'=> 'required | string',
            'description'=> 'required | string',
        ]);

        $project = new project;
        $project->icon=$request->icon;
        $project->title=$request->title;
        $project->description=$request->description;

        $project->save();

        return redirect()->route('admin.project.list')->with('success', 'New projects created successfully');
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
        $project = Project::find($id);
        return view('pages.project.edit', compact('project'));
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
            'icon'=> 'required | string',
            'title'=> 'required | string',
            'description'=> 'required | string',
        ]);

        $project = Project::find($id);
        $project->icon=$request->icon;
        $project->title=$request->title;
        $project->description=$request->description;

        $project->save();

        return redirect()->route('admin.project.list')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        
        return redirect()->route('admin.project.list')->with('success', 'Project deleted successfully');
    }
}
