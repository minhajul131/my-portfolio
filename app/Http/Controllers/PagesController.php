<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\About;
use App\Models\Project;
use App\Models\Education;

class PagesController extends Controller
{
    
    public function index(){
        $home = Home::first();
        $about = About::first();
        $project = Project::all();
        $education = Education::all();
        return view('pages.index', compact('home', 'about', 'project', 'education'));
    }
    
    // public function about(){
    //     return view('pages.about');
    // }
}
