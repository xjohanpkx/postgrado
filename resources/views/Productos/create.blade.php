@extends('layouts.layout')
@section('cabecera')

@endsection

@section('contenido')
<form  action="/productos" method="POST">
  		{{ csrf_field() }}
<input type="text" name="nombre">
<input type="submit" name="enviar" value="enviar">

</form>

@endsection
@section('pie')

@endsection
