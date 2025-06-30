{{-- create --}}
@extends('layouts.app')
@section('title','Nuevo Usuario')
@section('content')
<h2>Agregar usuario</h2>
<form action="{{ route('usuarios.store') }}" method="POST">
    @include('usuarios.form')
</form>
@endsection
