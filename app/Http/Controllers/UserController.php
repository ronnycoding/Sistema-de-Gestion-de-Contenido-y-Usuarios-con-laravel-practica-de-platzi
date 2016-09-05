<?php

namespace laravelapplication\Http\Controllers;

use Illuminate\Http\Request;

use laravelapplication\Http\Requests;
use laravelapplication\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Events\Dispatcher;
use laravelapplication\UserRegistered;

class UserController extends Controller
{
    //Create User
    public function create()
    {
    	return view('user.create');
    }
    
    public function store(Request $request, Dispatcher $events){
	
		$validator = Validator::make($request->all(), [
			'name' => 'required',
	        'email' => 'required|email',
	        'password' => 'required',
	        'remember_token' => str_random(10),
		]);
    	
    	if($validator->fails())
    	{
    		return redirect()
    			->route('user_create_path')
    			->withInput()
    			->withErrors($validator);	
    	}
    	
    	$user = new User();
    	
    	$user->name = $request->get('name');
    	
    	$user->email = $request->get('email');
    	
    	$password = $request->get('password');
    	
    	$user->password = bcrypt($password);
    	
    	$user->save();
    	
    	$this->events = $events;
    	
    	$this->events->fire(new UserRegistered($user));
    	
    	return redirect()->route('home_show_path');
    }
}
