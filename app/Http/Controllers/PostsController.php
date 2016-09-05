<?php

namespace laravelapplication\Http\Controllers;

use Illuminate\Http\Request;
use laravelapplication\Http\Requests;
use laravelapplication\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    
    public function show($id)
    {
    	$post = Post::findOrFail($id);
    	
    	return view('post', ['post'=>$post]);
    }
    
    public function create(){
    	
    	return view('posts.create');
    }
    
    public function store(Request $request){
    	 
    	$validator = Validator::make($request->all(), [
    		'title' => 'required',
    		'body' => 'required',
    	]);
    	
    	if($validator->fails())
    	{
    		return redirect()
    			->route('post_create_path')
    			->withInput()
    			->withErrors($validator);	
    	}
    	
    	$post = new Post;
    	
    	$post->title = $request->get('title');
    	
    	$post->content = $request->get('body');
    	
    	$post->author_id = Auth::id();
    	
    	$post->save();
    	
    	return redirect()->route('post_show_path', $post->id);
    }
    
    public function edit($id)
    {
    	$post = Post::findOrFail($id);
    	
    	return view('posts.edit', ['post' => $post]);
    }
    
    public function update(Request $request, $id)
    {
    	$post = Post::findOrFail($id);
    	
    	$post->title = $request->get('title');
    	 
    	$post->content = $request->get('body');
    	 
    	$post->author_id = Auth::id();
    	 
    	$post->save();
    	
    	return redirect()->route('post_show_path', $post->id);
    }
    
    public function destroy($id)
    {
    	$post = Post::findOrFail($id);
    	
    	$post->delete();
    	
    	return redirect()->route('home_show_path');
    
    }
    
}
