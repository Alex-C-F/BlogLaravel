@extends('main')
@section('stylesheets')

{{!! Html::style('css/parsley.css') !!}}

@endsection

@section('title','|Nova Categoria')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Criar nova Categoria</h1>
		<hr>
		{!! Form::open(array('route'=>'categorias.store')) !!}
		<!-- Criando o form para cadastro com collective-->
		{{ Form::label('nome:','Nome:') }}
		{{ Form::text('nome',null,array('class'=>'form-control', 'data-parsley', 'required'=>'','maxlength'=>'255'))}}

		{{Form::submit('Cadastrar', array('class'=>'btn btn-success btn-lg btn-block', 'style'=> 'margin-top:20px;'))}}
		{!! Form::close() !!}


	</div>

</div>
@endsection

@section('scripts')

{!! Html::script('js/parsley.min.js') !!}

@endsection