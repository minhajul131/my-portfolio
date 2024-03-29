<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use File;

class AboutPageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $about = About::first();
        return view('pages.about', compact('about'));
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
        // $about = About::find($id);
        // return view('pages.abouts.edit', compact('about'));
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
            'birthday'=> 'required | string',
            'degree'=> 'required | string',
            'phone'=> 'required | string',
            'email'=> 'required | string',
            'city'=> 'required | string',
            'description'=> 'required | string',
        ]);

        $about = About::first();
        // $about->birthday=$request->birthday;
        // $about->image=$request->image;
        // $about->degree=$request->degree;
        // $about->phone=$request->phone;
        // $about->email=$request->email;
        // $about->city=$request->city;
        // $about->description=$request->description;
        // if($request->file('image')){
        //     $img_file = $request->file('image');
        //     $img_file->storeAs('public/img/','image.'.$img_file->getClientOriginalExtension());
        //     $about->image = 'storage/img/image.'.$img_file->getClientOriginalExtension();
        // }

        // $about->save();
        About::where('id',1)->update([
            'birthday'=>$request->birthday,
            'degree'=>$request->degree,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'city'=>$request->city,
            'description'=>$request->description,
        ]);
        $imageName = "";
        $deleteOldImage = 'img/'.$about->image;
        if($about = $request -> file('image')){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$about->getClientOriginalExtension();
            $about->move('img',$imageName);
            About::where('id',1)->update([
                'birthday'=>$request->birthday,
                'image'=>$imageName,
                'degree'=>$request->degree,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'city'=>$request->city,
                'description'=>$request->description,
            ]);
        }

        

        return redirect()->route('admin.about')->with('success', 'Information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $about = About::find($id);
        // $about->delete();
        
        // return redirect()->route('admin.abouts.list')->with('success', 'Information deleted successfully');
    }
}