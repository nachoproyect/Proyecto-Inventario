  @extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>CREAR ARTICULO </h1>
@stop

@section('content')
    <form action="/articulos" method="POST">
    @csrf
          

    <div class="mb-3">
        <label for="" class="form-label">Categoria</label>
        <select id="idcategoria" name="categoria_id" class="form-control" tabindex="1">
            <option value="" selected="disabled">-- Seleccione una Categoria --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach

        </select>             
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Sector</label>
        <select id="idsector" name="sector_id" class="form-control" tabindex="2">
            <option value="" selected="disabled">-- Seleccione un Sector --</option>
            @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Sede</label>
        <select id="idsede" name="sede_id" class="form-control" tabindex="3">
            <option value="" selected="disabled">-- Seleccione una Sede --</option>
            @foreach ($sedes as $sede)
                <option value="{{$sede->id}}">{{$sede->nombre}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Puesto</label>
        <input id="puesto" name="puesto" type="text" class="form-control" tabindex="4">
        @error('puesto')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">IP</label>
        <input id="ip" name="ip" type="text" class="form-control" tabindex="5">
         @error('ip')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Marca/Modelo</label>
        <select id="idmarca" name="marca_id" class="form-control" tabindex="6">
            <option value="" selected="disabled">-- Seleccione una Marca --</option>
            @foreach ($marcas as $marca)
                <option value="{{$marca->id}}">{{$marca->nombre}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Serial</label>
        <input id="serial" name="serial" type="text" class="form-control" tabindex="7">
        @error('serial')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Ficha Estante</label>
        <input id="estante" name="estante" type="text" class="form-control" tabindex="8">
        @error('estante')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="9">
    </div>

    

    <a href="/articulos" class="btn btn-secondary" tabindex="10">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="11">Guardar</button>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop