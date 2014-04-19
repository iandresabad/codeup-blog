@extends('layouts.master')

@section('title')
	{{{ $post->title }}}
		Ivans Blog
@stop

@section('content')
	<p class="blog-post-meta">{{{ $post->created_at->setTimeZone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}</p>
	<h1>{{{ $post->title }}}</h1>
	<p>{{{ $post->body }}}</p>
	<hr>
	<p><a href="{{{ action('PostsController@index') }}}">Return to posts listing</a></p>
	<div><img src="{{{ $post->imageID }}}"></div>

	<a href="#" id="btnDeletePost">Delete</a>
	<a href="{{{ action('PostsController@edit', $post->id) }}}" class="btn">Edit</a>

@stop

	{{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'delete', 'id' => 'formDeletePost')) }}
	
	{{ Form::Close() }}

@section('bottom-script')

<script>
$('#btnDeletePost').on('click', function (e) {
	e.preventDefault();
	if(confirm('Are you sure you want to delete this post?')) {
		$('#formDeletePost').submit();
	}
});
</script>
@stop
