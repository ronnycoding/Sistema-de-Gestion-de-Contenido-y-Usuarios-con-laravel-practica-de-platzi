@extends('layouts.default')

@section('content')

	<div class="jumbotron">
		<h1 class="text-xs-center"><small>Lista de Posts</small></h1>
	</ul>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			
				<ul class="list-unstyled">
					@foreach($posts as $post)
					
						<li>
							<p class="lead">
								<a href="{{ route('post_show_path', $post->id) }}">{{ $post->title }}</a></br>
								Author: {{ $post->author->name }}
								</br>
								Created: {{$post->created_at}}
							</p>
						</li>
				
					@endforeach
				</ul>
			
			</div>
		</div>
	</div>

@stop