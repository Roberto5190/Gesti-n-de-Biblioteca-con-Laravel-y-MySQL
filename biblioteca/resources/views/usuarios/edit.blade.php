{{-- edit --}}
@extends('layouts.app')
@section('title','Editar Usuario')
@section('content')
<h2>Editar usuario</h2>
<form action="{{ route('usuarios.update',$usuario) }}" method="POST">
    @method('PUT')
    @include('usuarios.form')
</form>
@endsection
