<?php

class SignupController extends BaseController {

    public function singUp()
    {
        return View::make('signup');
    }

    public function action_check()
    {
        $validation = Validator::make(Input::get(), $rules);
        
        if ($validation->fails()) {
            return Redirect::to('signup');
        }

        $email = Input::get('email');
        $password = Input::get('password');
        $created = Users::create($email, $password);

        if (Request::ajax()) {
            if ($created) {
                return Response::json(array('success' => true));
            } else {
                return Response::json(array('success' => false));
            }
        } else {
            return Redirect::to('index');
        } 
    }

}