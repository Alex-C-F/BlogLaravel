@extends('main')
@section('title','| HomePage')

@section('stylesheets')

{!! Html::style('css/parsley.css') !!}
@section('content')
        
       <div class = "row">
        <div class="jumbotron">
                <h2>Olá, seja bem vindo ao meu blog!</h2>
                <p>Aqui, teremos muitas informações a arespeito de mim!</p>
            </div>
    		<div class = "col-md-8">
            
            <!--Post 1-->
            @foreach ($posts as $post)
    			<div class="post">
    				<h3>{{$post->titulo}}</h3>
    				<p>{{substr(strip_tags($post->texto),0,300)}}{{strlen(strip_tags($post->texto)) > 300 ? "..." : ""}}</p>
                    <p><a href="{{ url('blog/'.$post->slug)}}" class="btn btn-primary">Leia mais</a></p>
    			</div><!--end post-->
                 <hr>
            @endforeach 
        		</div><!--Fim col-md-8-->
                <div class="col-md-3 col-md-offset-1">
                	<h2>Sidebar</h2>
                   
              	</div>
            
    	</div><!--Fim row--><!--Fim row-->
       
    
@endsection
@section('scripts')

{!! Html::script('js/parsley.min.js') !!}

@endsection