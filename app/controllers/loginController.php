<?php

class LoginController extends BaseController {

    public function showLogin()
    {
        return View::make('login');
    }
    
    public function doLogin()
    {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) 
        {
            return Redirect::intended('/posts');
        } else {
            return Redirect::back()->withInput();   
        }
    }

    public function action_check()
    {
        $rules = array(
            'email' => 'required|max:60',
            'password' => 'required|max:60'
        );

        $validation = Validator::make(Input::get(), $rules);
        
        if ($validation->fails()) {
            return Redirect::to('login');
        }

        $email = Input::get('email');
        $password = Input::get('password');
        $credentials = array('username' => $email, 'password' => $password);
        
        if (Auth::attempt($credentials)) {
            $lastURL    = Session::has('lastURL') ? Session::get('lastURL') : '/posts';
            Session::forget('lastURL');

            if (Users::isAdmin(Auth::user()->id)) {
                Session::put('isAdmin', true);
            } else {
                Session::put('isAdmin', false);
            }

            return Redirect::to($lastURL);
        } else {
            return Redirect::to('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::action('LoginController@showLogin');
    }

}