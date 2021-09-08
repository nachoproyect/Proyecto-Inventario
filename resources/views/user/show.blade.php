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
            <p class="card-category"><h4>Vista detallada del usuario {{$user->name}}</h4></p>
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
                          <img src="{{ asset('/img/contacto.jpg') }}" alt="image" height="150" class="avatar">
                
                    </a><br>
                    <table class="table table-bordered table-striped">
                      <tbody>
                        <tr>
                          <th>ID</th>
                          <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                          <th>Nombre</th>
                          <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                          <th>Correo</th>
                          <td>{{ $user->email }}</td>
                        </tr>
                        
                        <tr>
                          <th>Creado Por</th>
                          <td>{{ $user->created_by }}</td>
                        </tr>
                        <tr>
                          <th>Modificado Por</th>
                          <td>{{ $user->updated_by }}</td>
                        </tr>
                        <tr>
                          <th>Fecha De Creacion</th>
                          <td><a href="#" target="_blank"> {{ $user->created_at }} </a></td>
                        </tr>
                        <tr>
                          <th>Fecha De Modificacion</th>
                          <td><a href="#" target="_blank"> {{ $user->updated_at }} </a></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer bg-dark">
                    <div class="button-container">
                      <a href="{{ route('users.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                      @can('user.edit')
                      <a href="{{ route('users.edit', $user->id)}}" class="btn btn-sm btn-primary">
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