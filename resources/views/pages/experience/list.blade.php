@extends('layouts.admin_layout')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Experience list</h1>
    </div>

    <!-- Content Row -->
    <div class="table-responsive">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Session</th>
            <th scope="col">Institution</th>
            <th scope="col">Department</th>
            <th scope="col">Description</th>
            <th scope="col">Location</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @if(count($experiences) > 0)
                @foreach ($experiences as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->year}}</td>
                    <td>{{$item->institution}}</td>
                    <td>{{$item->department}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->location}}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-2"><a href="{{route('admin.experience.edit', $item->id)}}" class="btn btn-primary">Edit</a></div>
                        </div>
                        <div class="row">
                          <div class="col-sm-2 m-2">
                            <form action="{{route('admin.experience.destroy', $item->id)}}" method="POST">
                              @csrf
                              @method('Delete')
                              <input type="submit" value="Delete" name="submit" class="btn btn-danger" />
                            </form>
                          </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
            @endif
        </tbody>
      </table>
    </div>
      <!-- Content Row -->
</div>

@endsection