@extends('main')

@section('title','| Blog')

@section('content')
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>Blog</h1>
		</div>
		
	</div>
	@foreach ($posts as $post)
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>{{ $post->titulo }}</h2>
			<h5>Publicado em: {{ date('M j,Y',strtotime($post->created_at)) }}</h5>

			<p class="lead">{{ substr(strip_tags($post->texto), 0, 250)}}{!!strlen(strip_tags($post->texto)) > 250 ? '...' : "" !!}</p>
			<a href="{{route('blog.single', $post->slug)}}" class="btn btn-primary">Leia mais</a>
			<hr>
		</div>

	</div>

	@endforeach
	<div class="row">
		<div class="col-md-12 text-center">
			{{$posts->links()}}
		</div>
			
	</div>

@endsection
