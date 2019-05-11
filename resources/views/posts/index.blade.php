@extends('layouts.app')

@section('content')

     <div class="">
        <h1 class="text-secondary text-center">Latest Announcements</h1>
        <p class="text-secondary text-center">All of your announcements are displayed here.</p>
        
        <hr>
        <ul class="list-unstyled">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                      <li class="media my-2 card card-body bg-light">
                          <!--<img class="mr-3" src=".../64x64" alt="Generic placeholder image">-->
                          <div class="media-body">
                            <h5 class="mt-0 mb-0"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h5>
                            <small class="text-muted"><i class="fa fa-clock"></i> {{$post->created_at->toDayDateTimeString()}} <i class="fa fa-user"></i> {{$post->user->name}}</small>
                          </div>
                        </li>
                    @endforeach
                    <span class="row justify-content-center"> {{$posts->links()}} </span>

                @else
                      <p>No posts found</p> 
                @endif
          </ul>
     </div>
     
     
    <div class="col-md-3 py-3" style="background-color: #e9ecef;">
        @include('inc.sidebar-right')
    </div>
@stop