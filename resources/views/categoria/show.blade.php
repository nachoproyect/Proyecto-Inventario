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
            <p class="card-category"><h4>Vista detallada del activo {{$categoria->nombre}}</h4></p>
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
                          <td>{{ $categoria->id }}</td>
                        </tr>
                        <tr>
                          <th>Nombre</th>
                          <td>{{ $categoria->nombre }}</td>
                        </tr>
                        <tr>
                          <th>Descripcion</th>
                          <td>{{ $categoria->descropcion }}</td>
                        </tr>
                        
                        <tr>
                          <th>Creado Por</th>
                          <td>{{ $categoria->created_by }}</td>
                        </tr>
                        <tr>
                          <th>Modificado Por</th>
                          <td>{{ $categoria->updated_by }}</td>
                        </tr>
                        <tr>
                          <th>Fecha De Creacion</th>
                          <td><a href="#" target="_blank"> {{ $categoria->created_at }} </a></td>
                        </tr>
                        <tr>
                          <th>Fecha De Modificacion</th>
                          <td><a href="#" target="_blank"> {{ $categoria->updated_at }} </a></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer bg-dark">
                    <div class="button-container">
                      <a href="{{ route('categorias.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                      @can('categoria.edit')
                      <a href="{{ route('categorias.edit', $categoria->id)}}" class="btn btn-sm btn-primary">
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