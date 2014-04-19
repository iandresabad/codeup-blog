<?php

use Carbon\Carbon;

class Post extends BaseModel {

    protected $table = 'posts';

    /**
    * Define relationship to user (author)
    */
    public function user()
    {
    	return $this->belongsTo('User'); 
    }

    public static $rules = array(
    	'title' 	=> 'required|max:100',
    	'body' 		=> 'required|max:10000',
        'file'      => 'file'
	);

    public function update()
    {
        $file = Input::file('file');
        $destinationPath = public_path().'/uploads/';
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = str_random(12).'.'.$extension;
        $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
    }
}