@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>EDITAR MARCA Y MODELO</h1>
@stop

@section('content')
    <form action="/marcas/{{$marca->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$marca->nombre}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2" value="{{$marca->descripcion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Condicion</label>
        <input id="condicion" name="condicion" type="boolean" class="form-control" tabindex="3" value="{{$marca->condicion}}">
    </div>
    
    <a href="/marcas" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop