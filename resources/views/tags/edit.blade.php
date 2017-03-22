@extends('main')
@section('stylesheets')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('title','| Edit Tag')
@section('content')
<div class="row">
	{!! Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'PUT']) !!}
	<div class="col-md-8">
		{{Form::label('nome','Nome:')}}
		{{Form::text('name',null,['class'=>'form-control input-lg','required'=>'','maxlenght'=>255])}}
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Criado em:</dt>
					<dd>{{date('M j, Y H:i', strtotime($tag->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Última atualização:</dt>
					<dd>{{date('M j, Y H:i', strtotime($tag->updated_at))}}</dd>
			</dl>
			<hr>
			<div class="row">
					<div class="col-sm-6">
						{{Form::submit('Salvar dados',['class'=>'btn btn-success btn-block'])}}
					</div>
					<div class="col-sm-6">
					 
						{!! Html::linkRoute('tags.index','Cancelar',array($tag->id),array('class'=>'btn btn-danger btn-block')) !!}
					</div>
				
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>

@endsection
@section('scripts')

{!! Html::script('js/parsley.min.js') !!}