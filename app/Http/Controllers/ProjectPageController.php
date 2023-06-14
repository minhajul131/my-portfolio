<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\Models\Project;
use File;
class ProjectPageController extends Controller
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
            'icon'=> 'required | image',
            'title'=> 'required | string',
            'description'=> 'required | string',
        ]);

        // $project = new project;
        // $project->title=$request->title;
        // $project->description=$request->description;

        // $pr_img = $request->file('icon');
        // Storage::putFile('public/img', $pr_img);
        // $project->icon = "storage/img/".$pr_img->hashName();
        $imageName = "";
            if($project = $request -> file('icon')){
                $imageName = time().'-'.uniqid().'.'.$project->getClientOriginalExtension();
                $project->move('img',$imageName);
            }

        // $project->save();
        Project::create([
            'icon'=>$imageName,
            'title'=>$request->title,
            'description'=>$request->description,
            
        ]);

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
            
            'title'=> 'required | string',
            'description'=> 'required | string',
        ]);

        $project = Project::find($id);
        // $project->title=$request->title;
        // $project->description=$request->description;

        // if($request->file('icon')){
        //     $pr_img = $request->file('icon');
        //     Storage::putFile('public/img', $pr_img);
        //     $project->icon = "storage/img/".$pr_img->hashName();
        // }

        // $project->save();
        $imageName = "";
        $deleteOldImage = 'img/'.$project->image;
        if($project = $request -> file('icon')){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$project->getClientOriginalExtension();
            $project->move('img',$imageName);
        }else{
            $imageName = $project->icon;
        }

        Project::where('id',$id)->update([
            'icon'=>$imageName,
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

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
        @unlink(public_path($project->icon));
        $project->delete();
        
        return redirect()->route('admin.project.list')->with('success', 'Project deleted successfully');
    }
}
