<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'HomeController@showWelcome');

Route::get('orm-test', function () {
	$posts = Post::all();
	return $posts;
	// // // // Post::find(2); option 2
	foreach ($posts as $post) {
	// // // 	//take out the foreach if using option 2 
	echo '<h2>' . $post->title . '</h2>' . '<p>' . $post->body . '</p>';
	}
	// $post1 = new Post();
	// $post1->title = "Eloquent is awesome!";
	// $post1->body = "It is super easy to create a new post.";
	// $post1->save();

	// $post2 = new Post();
	// $post2->title = "Post number two";
	// $post2->body = "The body for post number two.";
	// $post2->save();
});


Route::get('/resume', 'HomeController@showResume');


Route::get('/portfolio', 'HomeController@showPortfolio');

Route::resource('posts', 'PostsController');
