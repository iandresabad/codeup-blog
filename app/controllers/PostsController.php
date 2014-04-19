<?php

class PostsController extends BaseController {

	public function __construct()
	{
		
		// include parent constructor
		parent::__construct();

		//Run an auth filter before all methos except index and show 
		$this->beforeFilter('auth', array('except' => array('inded', 'show' )));

		$this->beforeFilter('post.protect', array('only' => array('edit', 'update', 'destroy')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$search = Input::get('search');
		$query = Post::orderBy('created_at', 'desc');
		if(is_null($search))
		{
			$posts = $query->paginate(3);
		}else {
			$posts = $query->where('title', 'LIKE', "%{$search}%")
						   ->orWhere('body', 'LIKE', "%{$search}%")
						   ->paginate(3);
		}
		
		// $post = Post::with('user')->get();
		return View::make('posts.index')->with(array('posts' => $posts));	 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create')->with('post', new Post());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 // create the validator
	    $validator = Validator::make(Input::all(), Post::$rules);	 

	    // attempt validation

	    if ($validator->fails())
	    {
	        // validation failed, redirect to the post create page with validation errors and old inputs
	    	Session::flash('errorMessage', 'Post could not be created- see form errors');
	        return Redirect::back()->withInput()->withErrors($validator);
	    }
	    else
	    {
        // validation succeeded, create and save the post
			$post = new Post();

			$post->user_id = Auth::user()->id;
					$post->title = Input::get('title');
					$post->body = Input::get('body');
		    		
		    		if(Input::hasFile('file'))
					{
						//Shows the Path of an uploaded file:
						$post->imageID = '/uploads/'.$filename;
					}
				$post->save();
				Session::flash('succesMessage', 'Post created successfully');
				return Redirect::action('PostsController@index');
			}
		}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);
		$post->body = Markdown::parse($post->body);
		return View::make('posts.show')->with('post', $post);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		return View::make('posts.edit')->with('post', $post);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::find($id);
		 // create the validator
	    $validator = Validator::make(Input::all(), Post::$rules);


	    // attempt validation
	    if ($validator->fails())
	    {
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        Session::flash('errorMessage', 'Post could not be updated- see form errors');
	        return Redirect::back()->withInput()->withErrors($validator);
	    }
	    else
	    {
        // validation succeeded, create and save the post
	    	$post->user_id = Auth::user()->id;
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			    if(Input::hasFile('file') && (!empty($post->imageId))) 
				{
					//Shows the Path of an uploaded file:
					File::delete(public_path() . $post->imageID);
					$post->imageID = '/uploads/'.$filename;
				
					
					$post->imageID = $filename;
				}elseif (!empty($post->imageID) && (Input::get('delete') == 'delete')) {
					File::delete(public_path() . $post->imageID);
					$post->imageID = null; 
				}elseif (Input::hasFile('image') && (empty($post->imageID)) && (Input::get('delete') != 'delete')) {
					$post->imageID = '/uploads/'.$filename;
				}
			$post->save();
			Session::flash('succesMessage', 'Post updated successfully');
			return Redirect::action('PostsController@index');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::find($id)->delete();
		if (!empty($posts->id)){
				Session::flash('errorMessage', 'Post could not be deleted - please try again.');
			} else {
				Session::flash('successMessage', 'Post deleted successfully');	
			}

		return Redirect::action('PostsController@index');
	}

}