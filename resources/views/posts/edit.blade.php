@extends('main')
@section('title','| View Post')
@section('content')
<div class="row">
  {!! Form::model($post, ['route'=>['posts.update',$post->id],'method'=>'PUT','files'=>true]) !!}
  <div class="col-md-8">
    {{Form::label('titulo', 'Titulo:')}}
    {{Form::text('titulo',null,["class"=>'form-control input-lg'])}}

    {{Form::label('slug', 'Slug:')}}
    {{Form::text('slug',null,["class"=>'form-control input-lg'])}}
    
    {{Form::label('texto', 'Texto:',["class"=>'form-spacing-top'])}}
    {{Form::textarea("texto", null, ["class"=>'form-control'])}}

    {{Form::label('file_imagem','Atualize a sua imagem',["class"=>'form-spacing-top'])}}
    {{Form::file('file_imagem')}}
  </div>
  <div class="col-md-4">
    <div class="well">
      <dl class="dl-horizontal">
        <dt>Criado em:</dt>
        <dd>{{date('M j, Y H:i', strtotime($post->created_at))}}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Última atualização</dt>
        <dd>{{date('M j, Y H:i', strtotime($post->updated_at))}}</dd>
      </dl>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          {{ Form::submit('Salvar dados', ['class'=>'btn btn-success btn-block'])}}
          
        </div>
        <div class="col-sm-6">
          {!! Html::linkRoute('posts.show', 'Cancelar',array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>



@endsection