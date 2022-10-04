@extends('layouts.admin_layout')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create</h1>
    </div>

    <!-- Content Row -->
    <form action="{{route('admin.project.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>Your Information</h3>
                <div class=" mb-3">
                    <img src="{{(@$about->image)?url($about->image):secure_asset("assets/img/icon.jpg")}}" style="width: 100%">
                    <input class='mt-3 mb-3' type="file" name="icon">
                </div>
                <div class="mb-3">
                    <label for="title" <h4>Title</h4></label><br>
                    <input type="text" name="title" id="title">
                </div>
                <div class="mb-3">
                    <label for="description" <h4>Description</h4></label><br>
                    <textarea type="text" name="description" id="description"></textarea>
                </div>
            </div> 
        </div>
        <input type="submit" name="submit" class="btn btn-primary">
    </form>
    <!-- Content Row -->
</div>

@endsection