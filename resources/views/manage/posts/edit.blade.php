@extends('layouts.manage')

@section('content')
    <div class="col">
        <h1 class="text-secondary text-center">Edit Announcement</h1>

        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                    {{Form::hidden('_method', 'PUT')}}
                        <!--{{Form::submit('Submit', ['class' => 'btn btn-primary pull-right'])}}-->
                        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-save"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
    </div>
@stop