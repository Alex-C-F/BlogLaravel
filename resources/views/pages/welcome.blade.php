@extends('main')
@section('title','| HomePage')
@section('content')

    	<div class = "row">
    		<div class = "col-md-12">
    			<div class="jumbotron">
    				<h1>Seja bem vindo ao meu blog</h1>
    				<p class="jumbotron">Nele teremos muitas informações a respeito da jotam cursos profisionalizantes
                    </p>
                    <p><a class="btn-primary btn-lg" href="#" role="button">Popular post</a></p>
    			</div>
    		</div><!--Fim col-md-12-->
    	</div><!--Fim row-->
        
       <div class = "row">
    		<div class = "col-md-8">
            <!--Post 1-->
            @foreach ($posts as $post)
    			<div class="post">
    				<h3>{{$post->titulo}}</h3>
    				<p>{{substr($post->texto,0,300)}}{{strlen($post->texto) > 300 ? "..." : ""}}</p>
                    <p><a href="#" class="btn btn-primary">Leia mais</a></p>
    			</div><!--end post-->
                 <hr>
            @endforeach 
        		</div><!--Fim col-md-8-->
                <div class="col-md-3 col-md-offset-1">
                	<h2>Sidebar</h2>
                   
              	</div>

    	</div><!--Fim row--><!--Fim row-->
        <div class="text-center">
            {!! $posts->links(); !!}
        </div>
        
@endsection
	