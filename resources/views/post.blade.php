@extends('layouts.default')

@section('content')

	<div class="jumbotron">
		<h1 class="text-xs-center"><small>{{$post->title}}</small></h1>
	</ul>
	</div>
	<nav class="navbar navbar-light container">
			  <ul class="nav navbar-nav">
			  	<li class="nav-item">
			      <a class="nav-link" href="{{ url('/') }}">Go back</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="{{ route('post_edit_path', $post->id) }}">Edit Post</a>
			    </li>
			    <li class="nav-item">
			    <form class="nav-item" action="{{ route('post_delete_path', $post->id) }}" method="post">
			    	{{ csrf_field() }}
			    	<input type="hidden" name="_method" value="delete">
			    	<button type="submit" class="btn btn-danger">Delete Post</button>
			    </form>
			    </li>
			  </ul>
			</nav>	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<p>{{$post->content}}</p>
				<ul class="list-unstyled">
					<li>Author: {{$post->author->name}}</li>
					<li>Email: <a href="{{$post->author->email}}">{{$post->author->email}}</a></li>
					<li>Member from: {{$post->author->created_at}}</li>
				</ul>
				
			</div>
		</div>
	</div>

@stop