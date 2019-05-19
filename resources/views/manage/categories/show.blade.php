@extends('layouts.manage')

@section('content')
  <div class="col-md-12">
      <div class="row">
          <div class="mr-auto">
            <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa fa-caret-left"></i> Go Back</a>
          </div>
          <div class=" ml-auto">
            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-success"><i class="fa fa-user-plus"></i> Edit this Category</a>
          </div>
      </div>  
        
    <div class="row m-3">
      <div class="col-md-10">
        <a class="h1">{{$category->display_name}} <small class=""><em>({{$category->name}})</em></small></a> <br>
        
      </div>
      
    </div>
    <hr>

    <div class="col-md-12">
        <div class="col my-3">
            <h2 class="h3">Description:</h1>
            <a class="">{{$category->description}}</a>
        </div>
    </div>
  </div>
@endsection
