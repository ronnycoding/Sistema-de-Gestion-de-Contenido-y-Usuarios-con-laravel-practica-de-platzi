@extends('layouts.default')

@section('content')

<div class="container">

	<div class="jumbotron"><h1>Create a post</h1></div>
	
	<div class="row">
	
		<div class="col-md-12">
		
			@include('partials.errors')
			
			<form action="{{ route('post_create_path') }}" method="post">
		
				{{ csrf_field() }}
				
				
				<div class="form-group">
					<label for="example-text-input">Title</label>
				  	<input name="title" class="form-control" type="text" id="example-text-input" value="{{ old('title') }}">
				  </div>
				    
				  <div class="form-group">
				    <label for="exampleTextarea">Post Content</label>
				    <textarea name="body" class="form-control" id="exampleTextarea" rows="3">{{ old('body') }}</textarea>
				  </div>
				<button type="submit" class="btn btn-primary">Submit</button>
				  
			</form>
				
		</div>
	
	</div>
	
</div>
	
	

@stop