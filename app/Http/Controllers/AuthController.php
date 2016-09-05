<?php

namespace laravelapplication\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
    	
    	return view('auth');
    	
    }
    
    public function store(Request $request)
    {
    	
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required'
    	]);
    	
    	if(!Auth::attempt($request->only(['email','password']))){
    		
    		return redirect()->route('auth_show_path')->withErrors('No encontramos al usuario');
    		
    	}
    	
    	return redirect()->intended('/');
    }
    
    public function create(Request $request)
    {
    	$this->validate($request, [
    			'email' => 'required|email',
    			'password' => 'required'
    	]);
    	 
    	//return echo 'usuario creado';
    	 
    }
    
    public function destroy()
    {
    	auth()->logout();
    	
    	return redirect()->route('auth_show_path');
    }
}
