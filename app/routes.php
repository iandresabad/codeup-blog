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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/sayhello/{name}', function($name)
{
    return View::make('my-first-view')->with('name', $name);
});

Route::get('/resume', 'HomeController@showResume');


Route::get('/portfolio', 'HomeController@showPortfolio');

Route::resource('posts', 'PostsController');

Route::get('/rolldice/{guess?}', function($guess = 0)
{
	$rand = mt_rand(1, 6);
	if ($rand == $guess) {
		$result = 'You guessed correctly!';
	} else {
		$result = "You guessed wrong!";
	}

	$data = array("guess" => $guess, "rand" => $rand, 'result' => $result);
	return View::make('roll-dice')->with($data);
});