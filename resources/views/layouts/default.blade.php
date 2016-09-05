<!DOCTYPE html>
<html lang="en">
	<head>
	 	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel Application</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{elixir('css/app.css')}}">
	</head>
	<body>
		
		
			<nav class="navbar navbar-light bg-faded">
			  		<ul class="nav navbar-nav container">
			  		
			  	@if($currentUser)
				    <li class="nav-item">
				      <p class="nav-link active"><small>Wellcome</small> <strong>{{ $currentUser->name }}</strong></p>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" href="{{ route('post_create_path' )}}">Create Post</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" href="{{ route('auth_destroy_path' )}}">Logout</a>
				    </li>
			    
			    @else
			    
				    <li class="nav-item">
				      <a class="nav-link active" href="{{ route('auth_show_path' )}}">Login</a>
				    </li>
				    
			    @endif
			    	<li class="nav-item">
				    	<form class="form-inline pull-xs-right">
						   <input class="form-control" type="text" placeholder="Search">
						   <button class="btn btn-outline-success" type="submit">Search</button>
						 </form>
					</li>
			    
				  </ul>
				</nav>		
			
		
		@yield('content')
		
		<script type="text/javascript" src="#"></script>
	</body>
</html>