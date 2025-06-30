@extends('layouts.app')
@section('title','Nuevo Libro')
@section('content')
<h2>Agregar libro</h2>
<form action="{{ route('libros.store') }}" method="POST">
    @include('libros.form')
</form>
@endsection
