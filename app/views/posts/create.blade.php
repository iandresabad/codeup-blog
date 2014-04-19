@extends('layouts.master')

@section('header')
  <h1 class="blog-title">Create a New Post</h1>
@stop

@section('content')
	<div class"blog-post">
      {{ Form::open(array('action' => 'PostsController@store', 'class' => 'form-horizontal', 'files' => 'true' )) }}
          <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} ">
            {{ Form::label('title', 'Title', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
              {{Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title' )) }}
              {{ $errors->first('title', '<p><span class="help-block">:message</span>') }}  
            </div>
          </div>
          <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
            {{ Form:: label('body', 'Body', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('body', null, array('class' => 'form-control', 'rowl' => '5')) }}
              {{ $errors->first('body', '<p><span class="help-block">:message</span>') }}
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('file', 'Upload Image: ') }}
            {{ Form::file('file'); }}
          </div>  
          <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Create Post</button>
        </div>
      </div>
    {{Form::close() }}
</div>
@stop
