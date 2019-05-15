@extends('layouts.manage')

@section('content')

    <div class="col">
        <!--<a href="/" class="btn btn-primary btn-sm"><i class="fa fa-caret-left"></i> Go Back</a>-->
        <a href="{{ URL::previous() }}"class="btn btn-primary btn-sm"><i class="fa fa-caret-left"></i> Go Back</a>
        
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Post?')">Delete <i class="fa fa-trash"></i></button>
                {!! Form::close()!!}

                <a href="/manage/posts/{{$post->id}}/edit" class="btn btn-success btn-sm pull-right mr-3">Edit <i class="fa fa-edit"></i></a>
            @endif
        @endif     

        <hr>
        <h1>{{$post->title}}</h1>
        <small>
            <i class="fa fa-clock"></i> {{$post->created_at->toDayDateTimeString()}} &emsp; 
            <i class="fa fa-user"></i> {{$post->user->name}} &emsp; 

            <!--This is not functioning well-->
            @if (!empty($post->tags))
                @foreach( $post->tags as $tag )
                    <a href="/posts/tags/{{ $tag }}" class="text-dark"><i class="fa fa-list-ul"></i> {{ $post->title }}</a>
                    @break
                @endforeach
            @endif   
            <!---->

        </small>
        <hr>
        <div class="text-center">
            @if($post->cover_image == 'noimage.jpg')
                <img hidden="hidden">
            @else
                <img style="width: 50%; align: center;" class="mr-3" src="/storage/cover_images/{{$post->cover_image}}" alt="featured image" id="featured-image">
            @endif
        </div>
        <div class="mt-4">
           {!!$post->body!!} 
        </div>
        <hr>
        
    </div>
@stop