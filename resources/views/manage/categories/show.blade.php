@extends('layouts.manage')

@section('content')
  <div class="col-md-12">
      <div class="row">
          <div class="mr-auto">
            <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa fa-caret-left"></i> Go Back</a>
          </div>
          <div class=" ml-auto">
            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-success"><i class="fa fa-user-plus"></i> Edit this Category</a>
          </div>
      </div>  
        
    <div class="row m-3">
      <div class="col-md-10">
        <a class="h1">
          {{$category->display_name}} <a class="badge badge-primary text-light"> {{ $category->post->count() }} Announcements</a><br> 
          <small class=""><em>({{$category->name}})</em></small>
        </a> 
        
      </div>
      
    </div>
    <hr>

    <div class="col-md-12">
        <div class="col my-3">
            <a class="h4">Description:</a> <br>
            <a class="">{{$category->description}}</a>
        </div>
    </div>

  <div class="col-md-12">
    <div class="card my-5">
        {{-- <a class="h4">Associated Posts:</a> --}}
          @if(count($category->post) > 0)
            <table class="table table-responsive-md table-condensed">
                <thead>
                    <tr>
                        <th>Announcement Title</th>
                        <th>Excerpt</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>    
                  @foreach($category->post as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ substr(strip_tags($post->body), 0, 50) }}...</a></td>
                            <td>
                              <a href="/manage/posts/{{$post->id}}" class="btn btn-primary btn-sm m-1" title="View Post"><i class="fa fa-file"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
                
            </table>
            {{-- <span class="row justify-content-center"> {{$category->post->links()}} </span> --}}
          @else
              <p>You have no posts under this category</p>
          @endif
    </div>
  </div>

</div>
@endsection
