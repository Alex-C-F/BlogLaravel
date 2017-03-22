@extends('main')

@section('title',"| $post->titulo")

@section('content')
	<div class="row">
		<div class="col-md-12">
			
			<img class="img-responsive" src="{{asset('images/' . $post->imagem)}}" alt="Algo para mostrar" height="400" width="800"/>
			
			<h1>{{$post->titulo}}</h1>
			<p class="lead">{!!$post->texto!!}</p>
			<hr>
			<div class="tags">
			@if ($post->tags == null)
				<span class="label label-default">Sem tag definida</span>		
			@else
				@foreach($post->tags as $tag)
					<span class="label label-default">{{$tag->name}}</span>		
				@endforeach
			@endif
		</div>
		<hr>
			<p>Postado em: {{$post->created_at}}</p>
		</div>
	</div>
@endsection