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
<div class="form-group">
	<label class="col-sm-2 control label" for="file">Upload a Photo</label>
		<div class="col-sm-10">
			<input id="file" name="file" type="file">
		</div>
	</div>

{{ Form::submit('Save Post') }}