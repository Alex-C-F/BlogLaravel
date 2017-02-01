@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>Mensagem: </strong>{{Session::get('success')}}
	</div>
@endif

@if (count($errors) >0)
	<div class="alert alert-danger" role="alert">
		<strong>Voce cometeu um erro </strong>
		<ul>
		@foreach ($errors->all() as $error)

			<li> {{'1 - '.$error}}</li>
		@endforeach
		</ul>
	</div>
@endif