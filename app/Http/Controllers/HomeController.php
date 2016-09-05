<?php

namespace laravelapplication\Http\Controllers;

use Illuminate\Http\Request;

use laravelapplication\Http\Requests;

use Illuminate\Support\Facades\Auth;

use laravelapplication\Post;

class HomeController extends Controller
{
    /**
     * @return Home view
     */
	
	public function index()
	{
		
		$posts = Post::with('author')->get();
		
		
		return view('home', ['posts' => $posts]);
	}
	
}
