@extends('layouts.master')

@section('content')
  <h1 class="blog-title">Create a New Post</h1>
	<div class"blog-post">
    	<form class="form-horizontal" role="form" action="{{{ action('PostsController@store') }}}" method="post">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{{ Input::old('title') }}}">
              {{ $errors->has('title') ? $errors->first('title', '<p><span class="help-block">:message</span>') : ''}}  
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Body</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="body" name="body" rows="5">{{{ Input::old('body') }}}</textarea>
              {{ $errors->has('body') ? $errors->first('body', '<p><span class="help-block">:message</span>') : ''}}
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Create Post</button>
            </div>
          </div>
    </form>
</div>
@stop
