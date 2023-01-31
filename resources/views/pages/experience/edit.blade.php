@extends('layouts.admin_layout')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit</h1>
    </div>

    <!-- Content Row -->
    <form action="{{route('admin.experience.update', $experience->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>Your Information</h3>
                <div class="mb-3">
                    <label for="year" <h4>Session</h4></label><br>
                    <input type="text" name="year" id="year" value="{{(@$experience->year)?$experience->year:'year'}}">
                </div>
                <div class="mb-3">
                    <label for="institution" <h4>Institution</h4></label><br>
                    <input type="text" name="institution" id="institution" value="{{(@$experience->institution)?$experience->institution:'institution'}}">
                </div>
                <div class="mb-3">
                    <label for="department" <h4>Department</h4></label><br>
                    <input type="text" name="department" id="department" value="{{(@$experience->department)?$experience->department:'department'}}">
                </div>
                <div class="mb-3">
                    <label for="description" <h4>Description</h4></label><br>
                    <input type="text" name="description" id="description" value="{{(@$experience->description)?$experience->description:'description'}}">
                </div>
                <div class="mb-3">
                    <label for="location" <h4>Location</h4></label><br>
                    <input type="text" name="location" id="location" value="{{(@$experience->location)?$experience->location:'location'}}">
                </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary">
    </form>
    <!-- Content Row -->
</div>

@endsection