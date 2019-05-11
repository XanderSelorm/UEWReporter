@extends('layouts.manage')

@section('content')
<div class="container col">
    <div class="col-md-12 ml-auto mr-auto">
        <div class="row">
            <div class="mr-auto ml-3">
                    <a href="{{ URL::previous() }}"class="btn btn-primary btn-sm"><i class="fa fa-caret-left"></i> Go Back</a>
                    <a class="h3 ml-4">View Permission Details</a>
            </div>
            <div class="ml-auto mr-3">
                    {{-- {!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    <button type="submit" class="btn btn-danger btn-sm">Delete Permission <i class="fa fa-trash"></i></button>
                {!! Form::close()!!} --}}

                <a href="/manage/permissions/{{$permission->id}}/edit" class="btn btn-success btn-sm pull-right mr-3">Edit Permission <i class="fa fa-edit"></i></a>
            </div>
        </div>
        <hr>

        <div>
            <form>
                <div class="form-group">
                    <label for="name">Display Name:</label><br>
                    <input type="text" class="form-control" value="{{$permission->display_name}}" disabled>
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label><br>
                    <input type="text" class="form-control" value="{{$permission->name}}" disabled>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label><br>
                    <input type="text" class="form-control" value="{{$permission->description}}" disabled> 
                </div>
            </form>
        </div>
    </div>
</div>
@stop