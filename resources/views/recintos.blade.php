@extends('layouts.landing')

@section('titulo', 'Recintos y tarifas — ' . config('empresa.nombre'))

@section('contenido')
  @include('sections.recintos', ['recintos' => $recintos])
@endsection
