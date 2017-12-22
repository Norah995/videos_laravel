@extends('layaut')

@section('title', "Usuario {$id}")

@section('content')
	<h1>usuario #{{ $id }}</h1>
    mostrando detalle del usuario: {{ $id }}  


@endsection