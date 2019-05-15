@extends('layouts.manage')

@section('content')
<div class="container col">
    <div class="justify-content-center">
        <div class="col-md-12">
                
            <div class="">
                <div class="card-body">
                        <div class="row">
                          {{-- <div>
                            <a href="{{ URL::previous() }}"class="btn btn-primary mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
                          </div> --}}
                            <div class="mr-auto ml-3">
                                <a class="h2">Manage Announcements</a>
                            </div>
                            <div class="ml-auto mr-3">
                                <a href="/manage/posts/create" class="btn btn-primary"><i class="fa fa-plus"></i> Publish</a>
                            </div>
                        </div>
                        <hr>

                    @if(count($posts) > 0)
                        <table class="table table-striped table-hover table-responsive-md table-condensed">
                            <colgroup>
                                <col style="width: 50%;">
                                <col style="width: 15%;">
                                <col style="width: 15%;">
                                <col style="width: 20%;">
                            </colgroup>
                            <thead class="">
                                <tr>
                                    <th>Announcement Title</th>
                                    <th>Published On</th>
                                    <th>Updated On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md- col-sm-2">
                                                    <img style="width: 100%;" class="mr-2 img-thumbnail" src="/storage/cover_images/{{$post->cover_image}}" alt="featured image">
                                                </div>
                                                <div class="col-md-9 col-sm-10 my-2">
                                                    <a>{{$post->title}}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td><small>{{$post->created_at->toFormattedDateString()}}</small></td>
                                        <td><small>{{$post->updated_at->toFormattedDateString()}}</small></td>
                                        <td>
                                            <a href="posts/{{$post->id}}" class="btn btn-primary btn-sm m-1" title="View Post"><i class="fa fa-eye"></i></a>

                                            <a href="/manage/posts/{{$post->id}}/edit" class="btn btn-success btn-sm m-1" title="Edit Post"><i class="fa fa-edit"></i></a>

                                            <a class="btn btn-sm" title="Delete Post">
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    @csrf
                                                    {{-- {{Form::hidden('_method', 'DELETE')}} --}}
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Post?')"><i class="fa fa-trash"></i></button>
                                                    {{-- <!--{{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}--> --}}
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <span class="row justify-content-center"> {{$posts->links()}} </span>
                    @else
                        <p>You have no posts</p>
                        <small>Click on <strong><i class="fa fa-plus"></i> Publish</strong> on the navigation bar to create an Announcement.</small> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
