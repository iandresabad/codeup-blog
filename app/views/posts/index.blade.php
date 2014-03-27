@extends('layouts.master')

@section('header')
	<h1 class="blog-title">Welcome to my Blog</h1>
@stop

@section('content')
	@foreach ($posts as $post)
	<div class="blog-post">
		<h2 class="blog-post-title">{{{ $post->title }}}</h2>
		<p class="blog-post-meta">{{{ $post->created_at }}}</p>
		<p>{{{ $post->body }}}</p>
	</div>
	@endforeach
<p>
	<a href="{{{ action('PostsController@index') }}}"></a>
</p>
@stop