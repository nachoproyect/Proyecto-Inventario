@extends('adminlte::page')

@section('title', 'DGHC')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary">
            <div class="card-title"><h2>Activos</h2></div><br>
            <p class="card-category"><h4>Vista detallada de la sede {{$sede->nombre}}</h4></p>
          </div>
          <!--body-->
          <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="success">
              {{ session('success') }}
            </div>
            @endif
            <div class="row">
              
              <!--comienzo segunda opcion de detalles de articulos -->
              <div class="col-md-12">
                <div class="card card-user">
                  <div class="card-body">
                    <a href="#">
                          <img src="{{ asset('/img/hard.png') }}" alt="image" height="150" class="avatar">
                
                    </a><br>
                    <table class="table table-bordered table-striped">
                      <tbody>
                        <tr>
                          <th>ID</th>
                          <td>{{ $sede->id }}</td>
                        </tr>
                        <tr>
                          <th>Nombre</th>
                          <td>{{ $sede->nombre }}</td>
                        </tr>
                        <tr>
                          <th>Descripcion</th>
                          <td>{{ $sede->descropcion }}</td>
                        </tr>
                        
                        <tr>
                          <th>Creado Por</th>
                          <td>{{ $sede->created_by }}</td>
                        </tr>
                        <tr>
                          <th>Modificado Por</th>
                          <td>{{ $sede->updated_by }}</td>
                        </tr>
                        <tr>
                          <th>Fecha De Creacion</th>
                          <td><a href="#" target="_blank"> {{ $sede->created_at }} </a></td>
                        </tr>
                        <tr>
                          <th>Fecha De Modificacion</th>
                          <td><a href="#" target="_blank"> {{ $sede->updated_at }} </a></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer bg-dark">
                    <div class="button-container">
                      <a href="{{ route('sedes.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                      @can('sede.edit')
                      <a href="{{ route('sedes.edit', $sede->id)}}" class="btn btn-sm btn-primary">
                       Editar </a>
                      @endcan
                    </div>
                  </div>
                </div>
              </div>
              <!--fin segunda opcion de detalles de articulos -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop