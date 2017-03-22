@extends('main')
@section('title','| Novo Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}


<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=your_API_key"></script>

<script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=psavptcwhl5y3qi44328vb5fkq4lsbo2r6pvd89a3qt75j1h"></script>
 <script>
	tinymce.init({ 
		selector:'textarea',
		plugins:'link code',
		plugins:'image',
		menubar:false
	});
 </script>

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Criar novo Post</h1>

		
		<hr>
		{!! Form::open(array('route'=>'posts.store','files'=>true)) !!}
		<!-- Criando o form para cadastro com collective-->
		{{ Form::label('titulo:','Titulo:') }}
		{{ Form::text('titulo',null,array('class'=>'form-control', 'data-parsley', 'required'=>'','maxlength'=>'255'))}}

		{{ Form::label('slug','Slug:',['class'=>'form-spacing-top'])}}
		{{ Form::text('slug', null,array('class'=>'form-control', 'data-parsley', 'required'=>'','minlength'=>'5','maxlength'=>'255')) }}

		{{ Form::label('categoria','Categoria')}}
		{{Form::select('categoria_id',$cats,null,['class'=>'form-control'])}}

		{{ Form::label('tags','Tags:')}}
		{{ Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}


		{{ Form::label('texto', 'Texto:', ['class'=>'form-spacing-top'])}} 
		{{ Form::textarea('texto',null, array('class'=>'form-control', 'data-parsley'))}} 
			
		
		{{Form::label('imagem','Selecione a imagem')}}
		{{Form::file('file_imagem',['array'=>'form-control'])}}

		{{Form::submit('Cadastrar', array('class'=>'btn btn-success btn-lg btn-block', 'style'=> 'margin-top:20px;'))}}
		{!! Form::close() !!}
		<a class="btn btn-primary form-spacing-top" href="{{Route('posts.index')}}"><<</a>


	</div>

</div>
@endsection

@section('scripts')

{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
	$('.select2-multi').select2();
</script>


@endsection