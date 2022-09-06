<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\About;
use App\Models\Project;

class PagesController extends Controller
{
    public function index(){
        $home = Home::first();
        $about = About::first();
        $project = Project::all();
        return view('pages.index', compact('home', 'about', 'project'));
    }

    public function dashboard(){
        return view('pages.dashboard');
    }
    
    public function about(){
        return view('pages.about');
    }
}
