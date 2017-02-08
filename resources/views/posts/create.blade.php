@extends('main')
@section('stylesheets')

		{{!! Html::style('css/parsley.css') !!}}

@endsection

@section('title','|Novo Post')
@section('content')
	<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<h1>Criar novo Post</h1>
								<hr>
							 {!! Form::open(array('route'=>'posts.store')) !!}
										<!-- Criando o form para cadastro com collective-->
									 {{ Form::label('titulo:','Titulo:') }}
									 {{ Form::text('titulo',null,array('class'=>'form-control', 'data-parsley', 'required'=>'','maxlength'=>'255'))}}
									 
									 {{ Form::label('slug','Slug:')}}
									 {{ Form::text('slug', null,array('class'=>'form-control', 'data-parsley', 'required'=>'','minlesgth'=>'5','maxlength'=>'255')) }}

									 {{ Form::label('texto', 'Texto:')}} 
									 {{ Form::textarea('texto',null, array('class'=>'form-control', 'data-parsley', 'required'=>''))}} 
								
									 {{Form::submit('Cadastrar', array('class'=>'btn btn-success btn-lg btn-block', 'style'=> 'margin-top:20px;'))}}
							 {!! Form::close() !!}

							
						</div>
					
				</div>
@endsection

@section('scripts')

{{!! Html::script('js/parsley.min.js') !!}}

@endsection