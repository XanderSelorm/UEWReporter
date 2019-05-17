@extends('layouts.manage')

@section('content')
<div class="col">
    <div class="card-header col-md-12">
        <a href="{{ URL::previous() }}"class="btn btn-primary mr-5"><i class="fa fa-caret-left"></i> Go Back</a>
        <a class="text-secondaryr h3">Publish New Announcement</a>
    </div>
    
    <div class="col-md-12 col-sm-12 mt-3">
    <!--NEWS STRIP-->
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                <div class="col-md-6 mt-4">
                    <button type="submit" class="btn btn-primary pull-right">Publish <i class="fa fa-upload"></i></button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@stop