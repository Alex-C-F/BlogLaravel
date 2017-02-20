@extends('main')
@section('title','| categorias cadasthados')
@section('content')
<div class="row">
  <div class="col-md-10">
    <h1>Todas as Categorias</h1> 
  </div>
  <div class="col-md-2">
    <h3> <a href="{{ route('categorias.create')}}" class="btn btn-lg btn-block btn-primary">+</a></h3>
   
  </div>
  
</div> <!-- fim row-->

<div class="row">
  <div class="col-md-12">
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
            {!! Html::linkRoute('categorias.show', ' Ver ',array($categoria->id), array('class'=>'btn btn-success btn-block')) !!}
          </td>
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
</div>

@endsection