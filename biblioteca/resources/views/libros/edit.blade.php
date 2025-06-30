@extends('layouts.app')
@section('title','Editar Libro')
@section('content')
<h2>Editar libro</h2>
<form action="{{ route('libros.update',$libro) }}" method="POST">
    @method('PUT')
    @include('libros.form')
</form>
@endsection
