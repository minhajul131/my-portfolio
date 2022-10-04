@extends('layouts.admin_layout')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">About</h1>
    </div>
    <!-- Content Row -->
    <form action="{{route('admin.about.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
    <div class="row">
        
        <div class="col-md-4 mt-3">
            <h3>About Image</h3>
            <img src="{{(@$about->image)?url($about->image):secure_asset("assets/img/image.jpg")}}" style="width: 100%">
            <input class='mt-3 mb-3' type="file" id="image" name="image">
        </div>
        
        <div class="col-md-4 mt-3">
            <h3>Your Information</h3>
            <div class=" mb-3">
                <label for="birthday" <h4>Birthday </h4></label><br>
                <input type="text" name="birthday" id="birthday" value="{{(@$about->birthday)?$about->birthday:"birthday"}}">
            </div>
            <div class=" mb-3">
                <label for="degree" <h4>degree </h4></label><br>
                <input type="text" name="degree" id="degree" value="{{(@$about->degree)?$about->degree:"degree"}}">
            </div>
            <div class="mb-3">
                <label for="phone" <h4>Phone Number</h4></label><br>
                <input type="text" name="phone" id="phone" value="{{(@$about->phone)?$about->phone:"phone"}}">
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <h3>Your Links</h3>
            <div class=" mb-3">
                <label for="email" <h4>E-mail </h4></label><br>
                <input type="email" name="email" id="email" value="{{(@$about->email)?$about->email:"email"}}">
            </div>
            <div class=" mb-3">
                <label for="city" <h4>Address </h4></label><br>
                <input type="text" name="city" id="city" value="{{(@$about->city)?$about->city:"city"}}">
            </div>
            <div class=" mb-3">
                <label for="description" <h4>Description</h4></label><br>
                <input type="text" name="description" id="description" value="{{(@$about->description)?$about->description:"description"}}">
            </div>
        </div>
        
    </div>
    <input type="submit" name="submit" class="btn btn-primary">
    <!-- Content Row -->
</form>
</div>
{{-- <h3>Background Image</h3>
<img src="{{asset('assets/img/hero-bg.jpg')}}" alt=""> --}}
@endsection