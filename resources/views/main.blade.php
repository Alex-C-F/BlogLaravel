<!DOCTYPE html>
<html lang="en">
<head>
	@include('partes._head')
</head>
<body>
	@include('partes._nav')
	<div class = "container">
  		
		@yield('content')
		<hr>
 		@include('partes._footer')
	</div><!--Fim container-->
	
    @include('partes._javascripts')
  </body>
</html>