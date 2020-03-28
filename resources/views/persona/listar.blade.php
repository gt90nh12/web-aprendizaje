<!-- ************** Formulario admin *************** -->
@extends('connect\admin')
@section('titulo_pagina', 'Persona')
@section('descripcion_pagina', 'Formulario listar personas')
<!-- *********************************************** -->
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de registro</h4>
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>CI.</th>
                                <th>Fecha de nacimiento</th>
                                <th>Celular</th>
                                <th>Correo electrónico</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>CI.</th>
                                <th>Fecha de nacimiento</th>
                                <th>Celular</th>
                                <th>Correo electrónico</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(!empty($personas))
                            @foreach($personas as $persona)
                                @php
                                    $estado_registro = $persona->estado;
                                @endphp
                                <tr>
                                    <td>{{ $persona->nombre}} {{ $persona->apellido_paterno}} {{$persona->apellido_materno}}</td>
                                    <td>{{ $persona->ci}}</td>
                                    <td>{{ $persona->fecha_nacimiento}}</td>
                                    <td>{{ $persona->celular}}</td>
                                    <td>{{ $persona->correo_electronico}}</td>
                                    <td>
                                    <a href="{{ route('editar_persona', $persona->id) }}" class="btn btn-warning footable-edit fas fas fa-edit"> </a>
                                    @if($persona->estado==true)
                                        <a href="{{ route('estado_registro', $persona->id) }}" class="btn btn-success  fas fa-arrow-alt-circle-up"></a>
                                    @elseif($persona->estado==false)    
                                        <a href="{{ route('estado_registro', $persona->id) }}" class="btn btn-danger fas fa-arrow-alt-circle-down"></a>
                                    @endif
                                    </td>
                                   
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>      
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@stop

@section('archivos_script_form')
    <!-- This is data table -->
    <script src="{{ ('assets/plugins/datatables/datatables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ ('assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
@stop
