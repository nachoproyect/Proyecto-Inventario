@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>LISTADO DE ARTICULOS</h1>
@stop

@section('content')
@can('articulo.create')
<a href="articulos/create" class="btn btn-primary mb-3">CREAR</a>
@endcan
<form action="{{route('articulo.imprimirBarra')}}"method="GET" id="form1"> 

<table id="articulos" class="table table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            
            <th scope="col">Categoria</th>
            
            <th scope="col">Marca/Modelo</th>
            <th scope="col">Serial</th>
            <th scope="col">Estante</th>
            <th scope="col">Faja</th>
            <th scope="col">Precinto</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Fec/Creacion</th>
            <th scope="col">Fec/Actualizacion</th>
            <th scope="col">Codigo de Barras</th>
            <th scope="col">Acciones</th>

        </tr>
        
    </thead>
    <tbody>
        @foreach ($articulos as $articulo)
        <tr>

            <td>{{$articulo->id}}</td>
           
            <td>{{$articulo->categoria->nombre}}</td>
            
            <td>{{$articulo->marca->nombre}}</td>
            <td>{{$articulo->serial}}</td>
            <td>{{$articulo->estante}}</td>
            <td>{{$articulo->faja}}</td>
            <td>{{$articulo->precinto}}</td>
            <td>{{$articulo->descripcion}}</td> 
            <td>{{$articulo->estado}}</td>
            <td>{{$articulo->created_at}}</td>
            <td>{{$articulo->updated_at}}</td>
            <td><center>{{$articulo->categoria->nombre}}  {{$articulo->marca->nombre}}<br>{{$articulo->descripcion}} <br>

                      {!! DNS1D::getBarcodeSVG($articulo->codigo,'C128C') !!}
                     <div class="checkbox">
                    <label>
                        <input type="checkbox" name="articulos[]" value ="{{$articulo}}">


                    </label>

                     </div>
                     </center>
            </td>

            
                

            <td>
                @can('articulo.show')
                   <a href="{{route('articulos.show', $articulo->id)}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                   @endcan
                   @can('articulo.edit')
                   <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-primary" ><i class="far fa-edit"></i></a>
                   @endcan
                <form action="{{route ('articulos.destroy', $articulo->id)}}" class="formulario-eliminar" method="POST">
                 
                   @csrf
                   @method('DELETE')
                   @can('articulo.destroy')
                   <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                   @endcan


                </form>
            </td>
        </tr>
        @endforeach

        <input  type="submit" form="form1" value="Imprimir Seleccion" class="btn btn-success mb-3">

         </form>

    </tbody>

</table>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </-- Datatable responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">

@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    </-- Para usar los botones -->
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
   
    </-- Para los estilos de excel  -->
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.5/js/buttons.html5.styles.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.5/js/buttons.html5.styles.templates.min.js">
    </script>

    </-- Datatable responsive  -->
    <script src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js" ></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
    $('#articulos').DataTable({
        responsive: true,
        "lengthMenu": [[15, 50, -1], [15, 50, "All"]],
            dom: "lBfrtip",
            buttons:{
                dom:{
                    button:{
                        clasName:'btn'
                    }
                },
                buttons:[
                {
                    extend: "excel",
                    text:'Exportar a Excel',
                    className: 'btn btn-outline-success',
                    excelStyles:{
                        template: 'blue_medium'
                    }
                    
                }
                /*{
                    extend: "pdf",
                    text: 'Exportar a PDF',
                    className: 'btn btn-danger'
                    btn-outline-success

                }*/

                ]
            }


    });
    new $.fn.dataTable.FixedHeader( table );
});
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    
@if (session('eliminar') == 'ok')
    <script>
       Swal.fire(
      '¡Eliminado!',
      'El registro se elimino con exito.',
      'success'
    ) 
    </script>

@endif

<script>
     $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
  title: '¿Estas seguro?',
  text: "¡Este registro se eliminara definitivamente!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Si, eliminar!',
  cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    
    this.submit();
  }
})
     });

</script>
@stop
