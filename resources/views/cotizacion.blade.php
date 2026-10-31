@extends('layouts.landing')

@section('titulo', 'Pedir cotización — ' . config('empresa.nombre'))

@section('contenido')
  @include('sections.contacto')
@endsection
