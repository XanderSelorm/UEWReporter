@extends('layouts.manage')

@section('content')
    <div class="col">
        <h1 class="text-secondary text-center">Edit Announcement</h1>
<hr>
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="row">    
                <div class="col-md-9 col-sm-12 mt-3">
                    <div class="form-group">
                        {{Form::label('title','Title')}}
                        {{Form::text('title',$post->title, ['class' => 'form-control', 'placeholder' => 'Announcement Title...'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('body','Body')}}
                        {{Form::textarea('body',$post->body, ['class' => 'form-control', 'id' => 'article-ckeditor' , 'placeholder' => 'Announcement Content...'])}}
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                                {{Form::label('cover_image','Add Featured Image')}} <br>
                                {{Form::file('cover_image')}}
                        </div>
                        <div class="form-group col-md-6 mt-4">
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-3 card mt-4">
                        <div class="row my-4">
                            <div class="col-md-12">
                                {{Form::hidden('_method', 'PUT')}}
                                    {{-- <!--{{Form::submit('Submit', ['class' => 'btn btn-primary pull-right'])}}--> --}}
                                    <button type="submit" class="btn btn-primary pull-right col-md-12">Update <i class="fa fa-upload"></i></button>
                                {!! Form::close() !!}
                            </div>
                        </div>
    
                        <input type="hidden" name="tag" :value="tagsSelected">
    
                        <div class="form-group">
                            <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->display_name }}</option>
                            @endforeach
                        </select>
                        </div>
    
                        <button type="button" class="btn bg-default btn-sm btn-block mb-2 border" data-toggle="collapse" data-target="#sidebar-archive">Modify Tags <span class="fa fa-caret-down"></span></button>
    
                        <div id="sidebar-archive" class="collapse in">
                            @foreach ($tags as $tag)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" v-model="tagsSelected" :value="{{ $tag->id }}">{{ $tag->name }}
                                </label>
                            </div>
                            @endforeach
                            <label class="label mt-3">
                                Add new Tag
                                <input type="text" class="form-control" v-model="tagSelected" :value="{{ $tag->id }}">
                            </label>
                        </div>
                        
                    </div>
            </div>
    </div>
@stop

@section('scripts')
<script>

    var app = new Vue({
        el: '#app',
        data: {
        tagsSelected: {!! $post->tag->pluck('id')!!}
        }
    });
    
</script>
@endsection