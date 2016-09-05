@extends('layouts.default')

@section('content')

<header class="jumbotron"><div class="container"><h2>Authentication form</h2></div></header>


<div class="container">
	
	<div class="row">
	
		@include('partials.errors')
		
		<div class="col-md-6 offset-md-3">
			<form class="form-group" action="{{ route('auth_store_path') }}" method="post">
				{{csrf_field() }}
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail3">Email address</label>
			    <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
			  </div>
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputPassword3">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
			  </div>
			  <div class="form-check">
			    <label class="form-check-label">
			      <input class="form-check-input" type="checkbox" name="checkbox"> Remember me
			    </label>
			  </div>
			  <button type="submit" class="btn btn-primary">Sign in</button>
			</form>
			<a href="{{ route('user_create_path') }}">Register User</a>
		
		</div>
	</div>
	
</div>

@stop