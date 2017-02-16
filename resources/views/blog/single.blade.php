@extends('main')

@section('title',"| $post->titulo")

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<img src="{{asset('images/' . $post->imagem)}}" alt="Algo para mostrar" height="400" width="800"/>
			</div>
			<h1>{{$post->titulo}}</h1>
			<p>{{$post->texto}}</p>
		</div>
	</div>
@endsection