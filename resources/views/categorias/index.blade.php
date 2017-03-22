@extends('main')
@section('title','| categorias cadasthados')
@section('content')
<div class="row">
 
   <div class="col-md-8">

    <h1 class="text-center">Todas as Categorias</h1> 
    <table class="table">
      <thead>
        <th>#</th>
        <th>Nome</th>
        <th>Criado em:</th>
        
      </thead>

      <tbody>
        @foreach ($categorias as $categoria)
        <tr>
          <th>{{$categoria->id}}</th>
          <th>{{substr($categoria->nome,'0','50')}}{{strlen($categoria->nome) > 50 ? "...":""}}</th>
          <th>{{$categoria->created_at}}</th>

          <td>
            {!! Html::linkRoute('categorias.edit', 'Editar',array($categoria->id), array('class'=>'btn btn-primary btn-block')) !!}
          </td>
          <td>
            {!! Form::open(['route'=>['categorias.destroy',$categoria ->id], 'method'=>'DELETE']) !!}<!-- http://laravel-recipes.com/recipes/124/opening-a-new-html-form-->
            {!! Form::submit('Excluir',['class'=>'btn btn-danger  btn-block']) !!}
            
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
      
    </table>
    <div class="text-center">
      {!!$categorias->links()!!}
    </div>
  </div> 
  <div class="col-md-3">
    
      <div class="well">
          {!! Form::open(array('route'=>'categorias.store','method'=>'POST')) !!}
      <!-- Criando o form para cadastro com collective-->
      {{ Form::label('nome:','Nome:') }}
      {{ Form::text('nome',null,array('class'=>'form-control', 'data-parsley', 'required'=>'','maxlength'=>'255'))}}

      {{Form::submit('Nova', array('class'=>'btn btn-primary btn-block', 'style'=> 'margin-top:20px;'))}}
      {!! Form::close() !!}
      </div>
       
  </div>
   
</div> <!-- fim row-->

@endsection