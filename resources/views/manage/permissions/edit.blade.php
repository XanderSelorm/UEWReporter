@extends('layouts.manage')

@section('content')
<div class="container col">
    <div class="col-md-12 ml-auto mr-auto">
        <div class="row">
            <div class="mr-auto ml-3">
                    <a href="{{ URL::previous() }}"class="btn btn-primary btn-sm"><i class="fa fa-caret-left"></i> Go Back</a>
                    <a class="h3 ml-4">Edit Permission</a>
            </div>
        </div>
        <hr>

        <div>
            <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                    {{method_field('PUT')}}
                @csrf

                <div class="form-group">
                    <label for="name">Display Name:</label><br>
                    <input type="text" class="form-control" name="display_name" value="{{$permission->display_name}}">
                </div>
                <div class="form-group">
                    <label for="slug">Slug <a class="text-sm text-muted">(cannot edit)</a>:</label>
                    <input type="text" class="form-control" value="{{$permission->name}}" disabled>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="description" value="{{$permission->description}}"> 
                </div>

                <div class="form-group row">
                    <button type="submit" class="btn btn-primary  ml-auto mr-auto">
                        Save Changes <i class="fa fa-save"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop