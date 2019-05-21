@extends('layouts.manage')

@section('content')
<div class="container col">
    <div class="col-md-12 ml-auto mr-auto">
        <div class="row">
            <div class="mr-auto ml-3">
                    <a href="{{ URL::previous() }}"class="btn btn-primary btn-sm"><i class="fa fa-caret-left"></i> Go Back</a>
                    <a class="h3 ml-4">View User Details</a>
            </div>
            <div class="ml-auto mr-3">
                    {{-- {!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        <button type="submit" class="btn btn-danger btn-sm">Delete User <i class="fa fa-trash"></i></button>
                    {!! Form::close()!!} --}}

                <a href="/manage/users/{{$user->id}}/edit" class="btn btn-success btn-sm pull-right mr-3">Edit User <i class="fa fa-edit"></i></a>
            </div>
        </div>
        <hr>

        <div>
            <form>
                <div class="form-group">
                    <label for="name"><strong>Username:</strong></label><br>
                    <p class="ml-3">{{$user->name}}</p>
                </div>
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label><br>
                    <p class="ml-3">{{$user->email}}</p>
                </div>
                <div class="form-group">
                    <label for="email"><strong>Date Joined:</strong></label><br>
                    <p class="ml-3">{{$user->created_at->toFormattedDateString()}}</p>
                </div>
                <div class="form-group">
                    <label for="email"><strong>Roles:</strong></label><br>
                    <ul>
                        {{ $user->roles->count() == 0 ? 'This user has not been assigned any roles yet' : '' }}
                        @foreach ($user->roles as $role)
                            <li>{{$role->display_name}}  <em> ({{$role->description}})</em></li>
                        @endforeach
                    </ul>                
                </div>
            </form>
        </div>
    </div>
</div>
@stop