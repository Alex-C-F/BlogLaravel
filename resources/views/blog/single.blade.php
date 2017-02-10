@extends('main')

@section('title',"| $post->titulo")

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{$post->titulo}}</h1>
			<p>{{$post->texto}}</p>
		</div>
	</div>
@endsection