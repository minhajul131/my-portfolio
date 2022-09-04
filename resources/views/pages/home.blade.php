@extends('layouts.admin_layout')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Home</h1>
    </div>
    <!-- Content Row -->
    <form action="{{route('admin.home.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
    <div class="row">
        
        <div class="col-md-4 mt-3">
            <h3>Your Information</h3>
            <div class=" mb-3">
                <label for="name" <h4>Name </h4></label><br>
                <input type="text" name="name" id="name" value="{{(@$home->name)?$home->name:"Name"}}">
            </div>
            <div class="mb-3">
                <label for="title" <h4>Title</h4></label><br>
                <input type="text" name="title" id="title" value="{{(@$home->title)?$home->title:"Name"}}">
            </div>
            <div>
                <label for="resume" <h4>Upload Resume </h4></label>
                <input type="file" name="resume" id="resume">
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <h3>Your Links</h3>
            <div class=" mb-3">
                <label for="name" <h4>Twitter Link </h4></label><br>
                <input type="text" name="tw_link" id="tw_link" value="{{(@$home->tw_link)?$home->tw_link:"Name"}}">
            </div>
            <div class=" mb-3">
                <label for="name" <h4>Facebook Link </h4></label><br>
                <input type="text" name="fb_link" id="fb_link" value="{{(@$home->fb_link)?$home->fb_link:"Name"}}">
            </div>
            <div class=" mb-3">
                <label for="name" <h4>Instagram Link </h4></label><br>
                <input type="text" name="insta_link" id="insta_link" value="{{(@$home->insta_link)?$home->insta_link:"Name"}}">
            </div>
            <div class=" mb-3">
                <label for="name" <h4>Skype Link </h4></label><br>
                <input type="text" name="skype_link" id="skype_link" value="{{(@$home->skype_link)?$home->skype_link:"Name"}}">
            </div>
            <div class=" mb-3">
                <label for="name" <h4>LinkedIn Link </h4></label><br>
                <input type="text" name="linkdin_link" id="linkdin_link" value="{{(@$home->linkdin_link)?$home->linkdin_link:"Name"}}">
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <h3>Background Image</h3>
            <img style="height: 10px, width: 10px" src="{{(@$home->bg_img)?url($home->bg_img):asset("assets/img/bg_img.jpg")}}" alt="">
            <input class='mt-3' type="file" id="bg_img" name="bg_img">
        </div>
    </div>
    <input type="submit" name="submit" class="btn btn-primary">
    <!-- Content Row -->
</form>
</div>
{{-- <h3>Background Image</h3>
<img src="{{asset('assets/img/hero-bg.jpg')}}" alt=""> --}}
@endsection