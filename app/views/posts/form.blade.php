<div>
	{{ Form:label('title', 'Title' )}}
	{{ Form::text('title' $post->title) }}
	{{ $errors->first('title', '<a><span class="help-block">:message</span></a>') }}
</div>
<div>
	{{ Form ::label('body', 'Body') }}
	{{ Form::textarea('body', $post->body) }}
	{{ $errors->first('body', '<a><span class="help-block">:message</span></a>') }}
</div>

{{ Form::submit('Save Post') }}