@extends('layouts.admin_layout')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Project list</h1>
    </div>

    <!-- Content Row -->
    <div class="table-responsive">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Icon</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @if(count($projects) > 0)
                @foreach ($projects as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->icon}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-2"><a href="{{route('admin.project.edit', $item->id)}}" class="btn btn-primary">Edit</a></div>
                        </div>
                        <div class="row">
                          <div class="col-sm-2">
                            <form action="{{route('admin.project.destroy', $item->id)}}" method="POST">
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