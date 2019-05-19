@extends('layouts.app')

@section('header')
   <div class="header-image"  style="background-image: url('/storage/cover_images/{{$post->cover_image}}');">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               <div class="site-heading">
                  <a class="h1">{{$post->title}}</a>
                  @include('inc.messages')

                  <div class="site-heading-buttons mt-4">
                     @guest
                        <a href="/login" class="col-md-2 btn btn-primary mr-3">Sign In <i class="fa fa-sign-in"></i></a>
                        <a href="/register" class="col-md-2 btn btn-success">Sign Up <i class="fa fa-user-plus"></i></a>
                     @endguest
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </div>
@endsection

@section('content')
   <div class="row col">
      <div class="col-md-8 col-sm-12 card p-4 mr-3">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ URL::previous() }}"class="btn btn-primary btn-sm mr-auto"><i class="fa fa-caret-left"></i> Go Back</a>
            </div>
        
            <div class="col-md-10 row">
                @if(!Auth::guest())
                    @if(Auth::user()->id == $post->user_id)
                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => ' ml-auto']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm ml-auto mr-3 col-md-12" onclick="return confirm('Are you sure you want to delete this Post?')">Delete <i class="fa fa-trash"></i></button>
                        {!! Form::close()!!}

                        <a href="/manage/posts/{{$post->id}}/edit" class="btn btn-success btn-sm mr-1 ml-2 col-md-2">Edit <i class="fa fa-edit"></i></a>
                    @endif
                @endif   
            </div>
         
        </div>
         

        <hr>
        <small>
            <i class="fa fa-clock"></i> {{$post->created_at->toDayDateTimeString()}} &emsp; 
            <i class="fa fa-user"></i> {{$post->user->name}} &emsp; 
            <i class="fa fa-folder-open"></i> {{$post->category->display_name}}

            <!--This is not functioning well-->
            {{-- @if ($post->tags != 0)
                @foreach( $post->tags as $tag )
                    <a href="/posts/tags/{{ $tag }}" class="text-dark"><i class="fa fa-list-ul"></i> {{ $tag }}</a>
                    @break
                @endforeach
            @endif    --}}
                <hr>
            @if (!empty($post->tag))
            @foreach( $post->tag as $tag )
                <span class="badge bg-info m-0 p-2"><i class="fa fa-tag"></i> <a href="/posts/tags/{{ $tag->name }}" class="text-dark">{{ $tag->name }} </a></span>
            @endforeach  
            @endif
            {{-- {{dd($post->tag)}} --}}
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

    
    <div class="col-md-3 py-3 card">
        @include('inc.sidebar-right')
    </div>
@stop