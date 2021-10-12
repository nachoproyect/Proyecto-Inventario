@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>CODIGO DE BARRAS </h1>
@stop

@section('content')
<div class="wrapper" style="display: grid; grid-template-columns: auto auto auto; padding: 10px;">
@foreach ($articulos as $articulo)
<?php
    $articuloObj = json_decode($articulo, true);
    //dd($articuloObj);
   // die();
?>

             
            <div class="container-item" style="border: black 2px solid;  padding: 2px;   border: 1px solid rgba(0, 0, 0, 0.8); padding: 20px; font-size: 30px; width: 300px; height: 150px; text-align: center;">
                <img src="{{ asset('/img/etiqueta.png') }}" alt="image" height="30px" class="avatar">
            <h6>{!! $articuloObj["categoria"]["nombre"] !!}
            {!! $articuloObj["marca"]["nombre"] !!}<br>
            {!! $articuloObj["descripcion"] !!}<br>
            {!! DNS1D::getBarcodeSVG($articuloObj["codigo"],'C128C') !!}</h6>
            </div>
        
        @endforeach
        
@stop
</div>

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
        "lengthMenu": [[10, 50, -1], [10, 50, "All"]],
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
@stop