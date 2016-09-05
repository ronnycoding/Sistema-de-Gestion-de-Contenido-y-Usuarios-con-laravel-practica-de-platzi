@extends('layouts.default')

@section('content')

	<header class="jumbotron">
		<div class="container">
			<h1>Register New User</h1>
		</div>
	</header>
	
	<div class="container">
		
		<div class="row">
	
			<div class="col-md-6 offset-md-3">
		
				@include('partials.errors')
				
				<form class="form-group" action="{{ route('user_store_path') }}" method="post">
					{{csrf_field() }}
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputEmail3">Email address</label>
				    <input type="name" name="name" class="form-control" placeholder="Enter Name">
				  </div>
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputEmail3">Email address</label>
				    <input type="email" name="email" class="form-control" placeholder="Enter email">
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
				  <button type="submit" class="btn btn-primary">Sign up</button>
				</form>
				
			</div>
		
		</div>
		
	</div>
	
	
	

@stop