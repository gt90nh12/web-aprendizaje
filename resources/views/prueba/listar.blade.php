<!-- ************** Formulario admin *************** -->
@extends('connect\admin')
@section('titulo_pagina', 'Pruebas')
@section('descripcion_pagina', 'Formulario listar prueba general')
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
                                <th>Prueba</th>
                                <th>Tipo pregunta</th>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                                <th>Puntaje</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Prueba</th>
                                <th>Tipo pregunta</th>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                                <th>Puntaje</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(!empty($pruebas))
                            @foreach($pruebas as $pregunta)
                                <tr>
                                    <td>{{ $pregunta->prueba}}</td>
                                    <td>{{ $pregunta->pregunta}}</td>
                                    <td>{{ $pregunta->respuesta}}</td>
                                    <td>{{ $pregunta->puntaje}}</td>
                                    <td>{{ $pregunta->name}}</td>
                                    <td>
                                    <a href="{{ route('mostrar_tec_cadena', $pregunta->id) }}" class="btn btn-info mdi mdi-cube-outline"> </a>
                                    {{-- <a href="{{ route('editar_tec_concentracion', $pregunta->id) }}" class="btn btn-warning mdi mdi-pencil-box-outline" title="Actualizar"></a> --}}
                                    @if($pregunta->estadoPRU==true)
                                        <a href="{{ route('estado_prueba', $pregunta->id) }}" class="btn btn-success  mdi mdi-arrow-up-bold-circle" title="Habilitado"></a>
                                    @elseif($pregunta->estadoPRU==false)    
                                        <a href="{{ route('estado_prueba', $pregunta->id) }}" class="btn btn-danger mdi mdi-arrow-down-bold-circle" title="Deshabilitado"></a>
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
    {{-- <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script> --}}
    <script>
        {{-- https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js --}}
        (function(f){"function"===typeof define&&define.amd?define(["jquery","datatables.net","datatables.net-buttons"],function(e){return f(e,window,document)}):"object"===typeof exports?module.exports=function(e,c){e||(e=window);if(!c||!c.fn.dataTable)c=require("datatables.net")(e,c).$;c.fn.dataTable.Buttons||require("datatables.net-buttons")(e,c);return f(c,e,e.document)}:f(jQuery,window,document)})(function(f,e,c){var i=f.fn.dataTable,h=c.createElement("a");i.ext.buttons.print={className:"buttons-print",
        text:function(b){return b.i18n("buttons.print","Imprimir")},action:function(b,c,i,d){var a=c.buttons.exportData(d.exportOptions),k=function(b,a){for(var c="<tr>",d=0,e=b.length;d<e;d++)c+="<"+a+">"+b[d]+"</"+a+">";return c+"</tr>"},b='<table class="'+c.table().node().className+'">';d.header&&(b+="<thead>"+k(a.header,"th")+"</thead>");for(var b=b+"<tbody>",l=0,m=a.body.length;l<m;l++)b+=k(a.body[l],"td");b+="</tbody>";d.footer&&a.footer&&(b+="<tfoot>"+k(a.footer,"th")+"</tfoot>");var g=e.open("",""), a=d.title;"function"===typeof a&&(a=a());-1!==a.indexOf("*")&&(a=a.replace("*",f("title").text()));g.document.close();var j="<title>"+a+"</title>";f("style, link").each(function(){var c=j,b=f(this).clone()[0],a;"link"===b.nodeName.toLowerCase()&&(h.href=b.href,a=h.host,-1===a.indexOf("/")&&0!==h.pathname.indexOf("/")&&(a+="/"),b.href=h.protocol+"//"+a+h.pathname+h.search);j=c+b.outerHTML});try{g.document.head.innerHTML=j}catch(n){f(g.document.head).html(j)}g.document.body.innerHTML="<h1>"+a+"</h1><div>"+("function"===typeof d.message?d.message(c,i,d):d.message)+"</div>"+b;d.customize&&d.customize(g);setTimeout(function(){d.autoPrint&&(g.print(),g.close())},250)},title:"*",message:"",exportOptions:{},header:!0,footer:!1,autoPrint:!0,customize:null};return i.Buttons});
        {{-- ---------------------------------------------------------------- --}}
    
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
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ ('assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
@stop
