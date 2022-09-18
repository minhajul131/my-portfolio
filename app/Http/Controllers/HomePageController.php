<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class HomePageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
        return view('pages.dashboard');
    }
    public function index()
    {
        $home = Home::first();
        return view('pages.home', compact('home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required | string',
            'title'=> 'required | string',
        ]);

        $home = Home::first();
        $home->name=$request->name;
        $home->title=$request->title;
        $home->tw_link=$request->tw_link;
        $home->fb_link=$request->fb_link;
        $home->insta_link=$request->insta_link;
        $home->skype_link=$request->skype_link;
        $home->linkdin_link=$request->linkdin_link;
        if($request->file('bg_img')){
            $img_file = $request->file('bg_img');
            $img_file->storeAs('public/img/','bg_img.'.$img_file->getClientOriginalExtension());
            $home->bg_img = 'storage/img/bg_img.'.$img_file->getClientOriginalExtension();
        }
        // if($request->hashfile('bg_img')){
        //     $file =$request->file('bg_img');
        //     $extention =$file->getClientOriginalExtension();
        //     $filename =time().'.'.$extention;
        //     $file->move('storage/img/',$filename);
        //     $home->bg_img = $filename;
        // }
        if($request->file('resume')){
            $pdf_file = $request->file('resume');
            $pdf_file->storeAs('public/pdf/','resume.'.$pdf_file->getClientOriginalExtension());
            $home->resume = 'storage/pdf/resume.'.$pdf_file->getClientOriginalExtension();
        }
        $home->save();
        return redirect()->route('admin.home')->with('success','Home page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
