@extends('main')
@section('stylesheets')

{{!! Html::style('css/parsley.css') !!}}

@endsection

@section('title','| NotFound')
@section('content')
	<style type="text/css">
	
	.error-template {padding: 40px 15px; text-align: center;}
	.error-actions {margin-top:15px;margin-bottom:15px;}
	.error-actions .btn { margin-right:10px; }'
	</style>
	<div class="container">
    	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="error-template">
							<h1>404 - Não encontrada</h1>

							<div class="error-actions well well-lg">
								<p>Desculpe, a página que foi acessada não existe ou foi removida.</p>
								<a title="Return to the previous page" href="javascript:history.go(-1);" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-circle-arrow-left"></span>
									Página anterior</a>
								<a title="Home" href="/" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-dashboard"></span> Página Inicial </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')

{!! Html::script('js/parsley.min.js') !!}