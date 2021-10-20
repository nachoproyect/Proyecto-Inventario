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
            <p class="card-category"><h4>Vista detallada del activo {{$articulo->categoria->nombre}}</h4></p>
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
                     <center><img src="{{ asset('/img/hard.png') }}" alt="image" height="150" class="avatar"> </center>
                
                    </a><br>
                    <table class="table table-bordered table-striped"><center>
                      <tbody>
                        <tr>
                          <th>ID</th>
                          <td><center>{{ $articulo->id }}</center></td>
                        </tr>
                        <tr>
                          <th>Codigo</th>
                          <td><center>{{ $articulo->codigo }}</center></td>
                        </tr>
                        <tr>
                          <th>Categoria</th>
                          <td><center>{{ $articulo->categoria->nombre }}</center></td>
                        </tr>
                        
                        <tr>
                          <th>Marca</th>
                          <td><center>{{ $articulo->marca->nombre }}</center></td>
                        </tr>
                        <tr>
                          <th>Serial</th>
                          <td><center>{{ $articulo->serial }}</center></td>
                        </tr>
                        <tr>
                          <th>Estante</th>
                          <td><center>{{ $articulo->estante }}</center></td>
                        </tr>
                        <tr>
                          <th>Descripcion</th>
                          <td><center>{{ $articulo->descripcion }}</center></td>
                        </tr>
                        <tr>
                          <th>Estado</th>
                          <td><center>{{ $articulo->estado }}</center></td>
                        </tr>

                        <tr>
                          <th>Creado Por</th>
                          <td><center>{{ $articulo->created_by }}</center></td>
                        </tr>
                        <tr>
                          <th>Modificado Por</th>
                          <td><center>{{ $articulo->updated_by }}</center></td>
                        </tr>
                        <tr>
                          <th>Fecha De Creacion</th>
                          <td><center><a href="#" target="_blank"> {{ $articulo->created_at }} </a></center></td>
                        </tr>
                        <tr>
                          <th>Fecha De Modificacion</th>
                          <td><center><a href="#" target="_blank"> {{ $articulo->updated_at }} </a></center></td>
                        </tr>
                        
                       

                        <tr> 
                        <th>Codigo de Barras</th>                      
                          <td><center>{{$articulo->categoria->nombre}} ,{{$articulo->marca->nombre}}<br>{{$articulo->descripcion}} <br>

                      {!! DNS1D::getBarcodeSVG($articulo->codigo,'C128C') !!}</center></td>
                       </tr>

                      </tbody>
                </table>
                    
                  </div>
                  <div class="card-footer bg-dark">
                    <div class="button-container">
                      <a href="{{ route('articulos.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                      @can('articulo.edit')
                      <a href="{{ route('articulos.edit', $articulo->id)}}" class="btn btn-sm btn-primary">
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