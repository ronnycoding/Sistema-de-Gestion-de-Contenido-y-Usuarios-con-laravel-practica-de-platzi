@extends('layouts.default')

@section('content')

<div class="container">

	<div class="jumbotron"><h1>Edit post</h1></div>
	
	<div class="row">
	
		<div class="col-md-12">
		
			@include('partials.errors')
			
			<form action="{{ route('post_patch_path', $post->id) }}" method="post">
		
				{{ csrf_field() }}
				
				<!-- HTML no permite que usemos diferentes metodos al post y get -->
				<input type="hidden" name="_method" value="delete">
				
				<div class="form-group">
					<label for="example-text-input">Title</label>
				  	<input name="title" class="form-control" type="text" id="example-text-input" value="{{ $post->title }}">
				  </div>
				    
				  <div class="form-group">
				    <label for="exampleTextarea">Post Content</label>
				    <textarea name="body" class="form-control" id="exampleTextarea" rows="6">{{ $post->content }}</textarea>
				  </div>
				<button type="submit" class="btn btn-primary">Save</button>
				  
			</form>
				
		</div>
	
	</div>
	
</div>
	
	

@stop