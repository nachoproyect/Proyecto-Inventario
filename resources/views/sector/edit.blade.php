@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>EDITAR SECTOR</h1>
@stop

@section('content')
    <form action="/sectors/{{$sector->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$sector->nombre}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2" value="{{$sector->descripcion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Condicion</label>
        <input id="condicion" name="condicion" type="boolean" class="form-control" tabindex="3" value="{{$sector->condicion}}">
    </div>
    
    <a href="/sectors" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop