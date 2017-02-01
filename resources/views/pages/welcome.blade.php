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
    			<div class="post">
    				<h3>Sonhos</h3>
    				<p>Sem sonhos, a vida não tem brilho. Sem metas, os sonhos não têm alicerces. Sem prioridades, os sonhos não se tornam reais. Sonhe, trace metas, estabeleça prioridades e corra riscos para executar seus sonhos. Melhor é errar por tentar do que errar por omitir. (Augusto Cury).
                    </p>
                    <p><a class="btn-primary btn-lg" href="#" role="button">Leia mais</a></p>
    			</div><!--end post-->
                 <hr>
                  <!--Post 2-->
                <div class="post">
    				<h3>A vida</h3>
    				<p>A vida é como uma câmera. Foque no que é importante, capture bons momentos, desenvolva a vida a partir de negativos. E, se as coisas não derem certo, tire outra foto..
                    </p>
                    <p><a class="btn-primary btn-lg" href="#" role="button">Leia mais</a></p>
    			</div><!--end post-->
                <hr>
                      <!--Post 3-->
                 <div class="post">
    				<h3>Dica do dia</h3>
    				<p>Dica do dia: Faça o melhor que puder. Seja o melhor que puder. O resultado virá na mesma proporção de seu esforço.
                    </p>
                    <p><a class="btn-primary btn-lg" href="#" role="button">Leia mais</a></p>
    			</div><!--end post-->
                 <hr>
    		</div><!--Fim col-md-8-->
            <div class="col-md-3 col-md-offset-1">
            	<h2>Sidebar</h2>
               
          	</div>
    	</div><!--Fim row--><!--Fim row-->
@endsection
	