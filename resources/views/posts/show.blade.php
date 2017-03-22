@extends('main')
@section('title','| View Post')
@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="text-center ">
			<img src="{{asset('images/' . $post->imagem)}}" alt="Algo para mostrar" height="200" width="400"/>
		</div>
		<h1>{{ $post->titulo }}</h1>
		<p class="lead"> {!! $post->texto !!}</p>
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
		
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>Url: </label>
				<label><a href="{{ route('blog.single',$post->slug ) }}">{{ route('blog.single',$post->slug) }}</a></label>
			</dl>
			<dl class="dl-horizontal">
				<label>Criado em:</label>
				<label>{{date('M j, Y H:i', strtotime($post->created_at))}}</label>
			</dl>
			<dl class="dl-horizontal">
				<label>Última atualização:</label>
				<label>{{date('M j, Y H:i', strtotime($post->updated_at))}}</label>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.edit', 'Editar',array($post->id), array('class'=>'btn btn-success btn-block')) !!}
					
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}<!-- http://laravel-recipes.com/recipes/124/opening-a-new-html-form-->
					{!! Form::submit('Excluir',['class'=>'btn btn-danger btn-block']) !!}
					
					{!! Form::close() !!}
					
				</div>
				<hr>
				<div class="col-sm-12">
					{!! Html::linkRoute('posts.index', '<< Ver todos os posts',null,array('class'=>'btn btn-primary btn-block')) !!}					
				</div>
			</div>
		</div>
	</div>
	
</div>



@endsection