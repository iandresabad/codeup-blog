@extends('layouts.master')

@section('title')
	{{{ $post->title }}}
		Ivan Blog
@stop
@section('content')
	<div>
		<h2>{{{ $post->title }}}</h2>
		<p>{{{ $post->body }}}</p>
		<p><a href="{{{ action('PostController@index') }}}"></a></p>
	</div>
@stop