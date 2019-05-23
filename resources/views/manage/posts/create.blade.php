@extends('layouts.manage')

@section('content')
<div class="col">
    <div class="card-header col-md-12">
        <a href="{{ URL::previous() }}"class="btn btn-primary mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
        <a class="text-secondaryr h3">Publish New Announcement</a>
    </div>
    
    
        
        <!--NEWS STRIP-->
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="row">    
                <div class="col-md-9 col-sm-12 mt-3">
                    @csrf
                    <div class="form-group">
                        {{Form::label('title','Title')}}
                        {{Form::text('title','', ['class' => 'form-control', 'placeholder' => 'Announcement Title...'])}}
                    </div>

                    <div class="form-group">
                        <slug-widget url="{{url('/')}}" subdirectory="blog" :title="title" @copied="slugCopied" @slug-changed="updateSlug"></slug-widget>
                        <input type="hidden" v-model="slug" name="slug" />
                    </div>

                    <div class="form-group">
                        {{Form::label('body','Body')}}
                        {{Form::textarea('body','', ['id' => 'body', 'class' => 'form-control', 'placeholder' => 'Announcement Content...'])}}
                    </div>

                    <div class="row mx-4">
                        <div class=" col-md-6 form-group">
                            {{Form::label('cover_image','Add Featured Image')}} <br>
                            {{Form::file('cover_image')}}

                        </div>
                        
                    </div>
                </div>

                <div class="col-md-3 card mt-4">
                    <div class="row my-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right col-md-12">Publish <i class="fa fa-upload"></i></button>
                        </div>
                    </div>

                    <input type="hidden" name="tags" :value="tagSelected">

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->display_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="button" class="btn bg-default btn-sm btn-block mb-2 border" data-toggle="collapse" data-target="#sidebar-archive">Add Tags <span class="fa fa-caret-down"></span></button>

                    <div id="sidebar-archive" class="collapse in">
                        @foreach ($tags as $tag)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" v-model="tagSelected" :value="{{$tag->id}}">{{$tag->name}}
                            </label>
                        </div>
                        @endforeach

                        
                        <label class="label mt-3">
                            Add new Tag
                            <input type="text" class="form-input" v-model="tagSelected" :value="{{$tag->id}}">
                        </label>
                    </div>
                    
                </div>
            </div>
        {!! Form::close() !!}
</div>
@stop

@section('scripts')
<script>

    var app = new Vue({
        el: '#app',
        data: {
        tagSelected: []
        }
    });
    
</script>
@endsection