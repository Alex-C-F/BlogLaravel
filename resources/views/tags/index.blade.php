@extends('main')
@section('stylesheets')

{{!! Html::style('css/parsley.css') !!}}

@endsection

@section('title','| Tags')
@section('content')
<div class="row">

	<div class="col-md-8">
		<h1 class="text-center">Todas as Tags</h1> 
		<table class="table">
			<thead>
				<th>#</th>
				<th>Nome</th>
				<th>Criado em:</th>
				<th>Ação</th>
			</thead>
			<tbody>
				@foreach ($tags as $tag)
				<tr>
					<th>{{$tag->id}}</th>
					<th>{{$tag->name}}</th>
					<th>{{$tag->created_at}}</th>
					<td>
						{!! Html::linkRoute('tags.edit','Editar', array($tag->id),array('class'=>'btn btn-primary btn-block')) !!}
					</td>
					<td>
						{!! Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE'])!!}

							{!! Form::submit('Excluir',['class'=>'btn btn-danger btn-block']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach


			</tbody>
		</table>
	</div>
	<div class="col-md-3">		
		<div class="well">
			{!!Form::open(array('route'=>'tags.store','method'=>'POST'))!!}
			{{ Form::label('nome','Nome:') }}
			{{ Form::text('nome',null,['class'=>'form-control','required'=>'','maxlength'=>'255']) }}
			<br>
			{{Form::submit('Novo',['class'=>'btn btn-success btn-block'])}}
			{!!Form::close()!!}
		</div>
	</div>
</div>
<div class="text-center">{{$tags->links()}}</div>
@endsection
@section('scripts')

{!! Html::script('js/parsley.min.js') !!}