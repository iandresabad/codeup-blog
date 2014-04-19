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

Event::listen('illuminate.query', function($sql, $bindings, $time) {
	log::info($sql);
	log::info(implode($bindings, ', '));
});

Route::get('/', function() {
    return View::make('hello');
})->before('auth.basic');

Route::get('/', 'HomeController@showWelcome');

Route::get('/login', 'HomeController@showLogin');

Route::post('/login', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@logout');

Route::get('orm-test', function () {
	$posts = Post::all();
	return $posts;
	// // // // Post::find(2); option 2
	foreach ($posts as $post) {
	// // // 	//take out the foreach if using option 2 
	echo '<h2>' . $post->title . '</h2>' . '<p>' . $post->body . '</p>';
	}
});

Route::get('post-test', function () {
	  $user = Post::first(2);
	  echo $post->title . '<br>';
	  echo 'Writeen by: ' . $post->user->email;
});

Route::get('/resume', 'HomeController@showResume');


Route::get('/portfolio', 'HomeController@showPortfolio');

Route::resource('posts', 'PostsController');
