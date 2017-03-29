<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;
use Response;
use Redirect;
use Auth;
use DB;
use Session;
use Validator;

class AdminController extends Controller {

    //
    public function Home() {
                $actiontypes = ActionTypes::all();

         return view('home' , compact('actiontypes'));
    }

    public function prelogin() {
        return View('auth.login');
    }

    public function login(Request $request) {
      $validators=  $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(
                        [
                            'email' => $request['email'],
                            'password' => $request['password'],
                        ]
                )) {

            return Redirect::to('/')
                            ->with('flash_notice', 'You are successfully logged in.');
        } else {
            return back()
        ->withErrors($validators) // send back all errors to the login form
        ->withInput(Input::except('password'))
                            ->with('flash_error', 'Your username/password combination was incorrect.')
                            ->withInput();
        }
    }

    public function preregister() {
        return View('auth.register');
    }

    public function register(Request $request) {
        $rules = array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
          return back()
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password'));}
        else {

            $user = new User;
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = bcrypt(Input::get('password'));
            $user->save();


            return back();
        }
    }

    public function logout() {
        Auth::logout(); // log the user out of our application
        return Redirect::to('/'); // redirect the user to the login screen
    }

}
