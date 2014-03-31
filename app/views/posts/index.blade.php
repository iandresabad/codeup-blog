@extends('layouts.master')

@section('header')
	<h1 class="blog-title">Welcome to my Blog</h1>
@stop

@section('content')
	@foreach ($posts as $post)
	<div class="blog-post">
		<h2 class="blog-post-title"><a href="{{{ action('PostsController@show', $post->id )}}}">{{{ $post->title }}}</a></h2>
		<p>{{ Str::words($post->body, 10) }}</p>
		<p class="blog-post-meta">{{{ $post->created_at->setTimeZone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}</p>
	</div>
	@endforeach
	{{ $posts->Links() }}

	<hr>

	<p>
		<a href="{{{ action('PostsController@create') }}}">Create New Post</a>
	</p>
@stop