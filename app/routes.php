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

Route::get('/', function() {
    return View::make('hello');
})->before('auth.basic');

Route::get('/', 'HomeController@showWelcome');

Route::get('orm-test', function () {
	$posts = Post::all();
	return $posts;
	// // // // Post::find(2); option 2
	foreach ($posts as $post) {
	// // // 	//take out the foreach if using option 2 
	echo '<h2>' . $post->title . '</h2>' . '<p>' . $post->body . '</p>';
	}
});

// public function run()
    
//     {
//         DB::table('users')->delete();

//         $user = new User();
//         $user->email = 'iandresabad@yahoo.com';
//         $user->password = Hash::make('letMeIn');
//         $user->save();
//     }

Route::get('/resume', 'HomeController@showResume');


Route::get('/portfolio', 'HomeController@showPortfolio');

Route::resource('posts', 'PostsController');
