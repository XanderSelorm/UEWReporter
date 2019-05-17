@extends('layouts.manage')

@section('content')
<div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <a href="{{ URL::previous() }}"class="btn btn-primary mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
                    <div class="mr-auto ml-3">
                        <a class="h2">Manage Announcement Categories</a>
                    </div>
                    <div class="ml-auto mr-5">
                        <a href="{{ url('/manage/categories/create') }}"class="btn btn-primary"><i class="fa fa-user-plus"></i> Create New Category</a>
                    </div>
                </div>
                
                <hr>

                @if(count($categories) > 0)
                    <table class="table table-striped table-hover table-responsive-md table-condensed">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>    
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->display_name}}</td>
                                    <td>{{$category->name}}</a></td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <a href="permissions/{{$category->id}}" class="btn btn-primary btn-sm"><i class="fa fa-file"></i> View</a>
                                        <a href="permissions/{{$category->id}}/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>

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
                    <span class="row justify-content-center"> {{$categories->links()}} </span>
                @else
                    <p>You have no categories</p>
                @endif
            </div>
        </div>
</div>
@stop