@extends('main')

@section('title','| View Post')
@section('stylesheets')
  {!! Html::style('css/parsley.css') !!}
  {!! Html::style('css/select2.min.css') !!}

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
  {!! Form::model($post, ['route'=>['posts.update',$post->id],'method'=>'PUT','files'=>true]) !!}
  <div class="col-md-8">
    {{Form::label('titulo', 'Titulo:')}}
    {{Form::text('titulo',null,["class"=>'form-control input-lg'])}}

    {{Form::label('slug', 'Slug:')}}
    {{Form::text('slug',null,["class"=>'form-control input-lg'])}}
    
    {{ Form::label('categoria','Categoria')}} 
    {{Form::select('categoria_id',$cats,null,['class'=>'form-control' ])}}

    {{ Form::label('tags','Tags:',['class'=>'form-spacing-top'])}} 
    {{Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}

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
      <dl class="dl-horizontal">
        <label>Url: </label>
        <label><a href="{{ route('blog.single',$post->slug ) }}">{{ route('blog.single',$post->slug) }}</a></label>
      </dl>
      <dl class="dl-horizontal">
        <label>Categoria:</label>
        <label><p>{{$post->categoria->nome}}</p></label>
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

@section('scripts')

{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
$('.select2-multi').select2();
  $('.select2-multi').select2().val({!! $post->tags()->allRelatedIds() !!}).trigger('change');
  
</script>

@endsection