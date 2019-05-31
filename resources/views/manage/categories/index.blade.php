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
                                    <td>{{$category->display_name}} <a class="badge badge-primary text-light"> {{ $category->post->count() }} </a></td>
                                    <td>{{$category->name}}</a></td>
                                    <td> {{ substr(strip_tags($category->description), 0, 50)}}...</td>
                                    <td>
                                        <a href="categories/{{$category->id}}" class="btn btn-primary btn-sm"><i class="fa fa-file"></i></a>
                                        <a href="categories/{{$category->id}}/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                                        {!!Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Category? This action cannot be reversed!')"><i class="fa fa-trash"></i></button>
                                            <!--{{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}-->
                                        {!!Form::close()!!}
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