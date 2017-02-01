@extends('main')
@section('title','| View Post')
@section('content')
	<h1>{{ $post->titulo }}</h1>
	<p class="lead"> {{ $post->texto }}</p>
@endsection