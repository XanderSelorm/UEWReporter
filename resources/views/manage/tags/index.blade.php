@extends('layouts.manage')

@section('content')
<div class="col">
    <div class="card-header col-md-12">
        <a href="{{ URL::previous() }}"class="btn btn-primary mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
        <a class="text-secondaryr h3">Announcements Tags</a>
    </div>

    <div class="row">
      <div class="col-md-6">
        @if(count($tags) > 0)
          <table class="table table-responsive-md table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>    
                @foreach($tags as $tag)
                  <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</a></td>
                    <td class="row btn-group">
                        <a href="tags/{{$tag->id}}/edit" id="btnEdit" class="btn btn-primary btn-sm text-light"><i class="fa fa-edit"></i></a>

                        {!!Form::open(['action' => ['TagsController@destroy', $tag->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Tag?')"><i class="fa fa-trash"></i></button>
                            {{-- <!--{{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}--> --}}
                        {!!Form::close()!!}
                    </td>
                  </tr>
                @endforeach
            </tbody>
            
            
          </table>
          <span class="row justify-content-center"> {{$tags->links()}} </span>
        @else
            <p>You have no tags</p>
        @endif
      </div>

      <div class="col-md-6">
        <a class="h3 mt-3">Create New Tag</a>
        <hr>
        <div class="row">
          <div class="col-md-12">
              <form method="POST" id="profileForm" action="{{ route('tags.update', $tag->id) }}" class="row" enctype="multipart/form-data"> 
                {{method_field('PUT')}}
                @csrf

                <div class="col-md-9">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" name="name" id="name" value="{{$tag->name}}" placeholder="Tag Name">
                    </div>
                  </div>  

                  <div class="">
                    <button class="btn btn-default border" type="reset"><i class="fa fa-repeat"></i> Reset Changes</button>
                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save Changes</button>
                  </div>
                </div>

              </div>
              
          </form>
          <hr>
          </div><!--/col-9-->
        </div><!--/row-->
      </div>
      
    </div>
@stop

@section('scripts')
<script>
$(document).ready(function() { 

//Edit Details
  $('#profileForm :input').prop("disabled", true);

  var el  = $('a#btnEdit');
  var frm = $('form#profileForm');

  // for(var i=0; i < frm.elements[i]; i++) {
  //         frm.elements[i].disabled = true;
  //     } 

  el.on('click', function(){
      
    $('#profileForm :input').prop("disabled", false);
      

      $('#btnReset').show();
      $('#btnSave').show();
    $('.file').show();
  });
//End

});
</script>
@endsection