@extends('main')

@section('title',"| $post->titulo")

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
			<h1>{{$post->categoria->nome}}</h1>
				<img src="{{asset('images/' . $post->imagem)}}" alt="Algo para mostrar" height="400" width="800"/>
			</div>
			<h1>{{$post->titulo}}</h1>
			<p>{{$post->texto}}</p>
			<hr>
			<p>Postado em: {{$post->created_at}}</p>
		</div>
	</div>
@endsection