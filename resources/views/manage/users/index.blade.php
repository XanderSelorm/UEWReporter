@extends('layouts.manage')

@section('content')
<div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mr-auto">
                        <a href="{{ URL::previous() }}"class="btn btn-primary mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
                    </div>
                    <div class="mr-auto ml-3">
                        <a class="h2">Manage Users</a>
                    </div>
                    <div class="ml-auto mr-3">
                        <a href="{{ url('/manage/users/create') }}"class="btn btn-primary"><i class="fa fa-user-plus"></i> Create New User</a>
                    </div>
                </div>
                
                <hr>

                @if(count($users) > 0)
                    <table class="table table-striped table-hover table-responsive-md table-condensed">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>User Since</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>    
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at->toFormattedDateString()}}</td>
                                    <td>
                                        <a href="users/{{$user->id}}" class="btn btn-primary btn-sm"><i class="fa fa-file"></i> View</a>
                                        <a href="users/{{$user->id}}/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        {{-- {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                            <!--{{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}-->
                                        {!!Form::close()!!} --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                        
                    </table>
                    <span class="row justify-content-center"> {{$users->links()}} </span>
                @else
                    <p>You have no posts</p>
                    <small>Click on <strong><i class="fa fa-plus"></i> Publish</strong> on the navigation bar to create an Announcement.</small> 
                @endif
            </div>
        </div>
</div>
@stop