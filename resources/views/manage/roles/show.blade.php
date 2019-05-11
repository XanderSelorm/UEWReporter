@extends('layouts.manage')

@section('content')
  <div class="col">
      <div class="row">
          <div class="col mr-auto">
            <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa fa-caret-left"></i> Go Back</a>
          </div>
          <div class="col ml-auto">
            <a href="{{route('roles.edit', $role->id)}}" class="btn btn-success"><i class="fa fa-user-plus"></i> Edit this Role</a>
          </div>
      </div>  
        
    <div class="row m-3">
      <div class="col-md-10">
        <a class="h1">{{$role->display_name}} <small class=""><em>({{$role->name}})</em></small></a> <br>
        <a class="h5">{{$role->description}}</a>
      </div>
      
    </div>
    <hr>

    <div class="col-md-12">
        <div class="container my-3">
            <h2 class="title">Permissions:</h1>
            <ul>
                @foreach ($role->permissions as $r)
                <li>{{$r->display_name}}  <em class="m-l-15"> ({{$r->description}})</em></li>
                @endforeach
            </ul>
        </div>
    </div>
  </div>
@endsection
