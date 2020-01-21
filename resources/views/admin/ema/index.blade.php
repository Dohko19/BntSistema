@extends('layouts.dashboard')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Reporte EMA (Emisión Mensual Anticipada)</h4>
                        <div class="toolbar">
                            <a href="#"
                                    class="btn btn-primary btn-sm"
                                    data-toggle="modal"
                                    data-target="#ema">
                                    <i class="fa fa-plus"></i>
                                        Agregar EMA
                                </a>
                        </div>
                        <div class="material-datatables">
                            <table id="datatablesEmas" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Periodo</th>
                                        <th>Fecha Correspondiente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emas as $ema)
                                        <tr>
                                            <td>
                                                {{ $ema->periodo->format('m-y') }}
                                            </td>
                                            <td>
                                                {{ $ema->desde->format('d/m/y') }} al
                                                {{ $ema->hasta->format('d/m/y') }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-just-icon btn-simple btn-twitter" target="_blank" href="{{ url('/area_legal/ema/'.$ema->pdf) }}"
                                                     data-toggle="tooltip" data-placement="top" title="Descargar">
                                                    <i class="fa fa-download">
                                                    </i> </a>
                                                    @can('view', $ema)
                                                        <a class="btn btn-sm btn-just-icon btn-simple btn-github" href="{{ route('admin.emas.edit', $ema) }}"
                                                         data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('delete', $ema)
                                                    <form style="display: inline;"
                                                     action="{{ route('admin.emas.destroy', $ema) }}" method="POST"
                                                     >
                                                     @method('DELETE')
                                                     @csrf
                                                     <button class="btn btn-sm btn-just-icon btn-simple btn-youtube"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Borrar Registro" onclick="return confirm('Estas seguro de Eliminar esta publicacion?')"></i></button>
                                                     </form>
                                                    @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>
@endsection
@push('scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#datatablesEmas').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                sProcessing:     "Procesando...",
                search: "_INPUT_",
                searchPlaceholder: "Buscar Registros",
                lengthMenu: "Mostrando _MENU_ registros",
                zeroRecords: "No hay registros disponibles",
                info: "Mostrando pagina _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros disponibles",
                sEmptyTable:     "Ningún dato disponible en esta tabla =(",
                infoFiltered: "(Filtrado desde _MAX_ total de registros)",
                sSearch:         "Buscar:",
                sLoadingRecords: "Cargando...",
                sInfoThousands:  ",",
                 oPaginate: {
                    sFirst:    "Primero",
                    sLast:     "Último",
                    sNext:     "Siguiente",
                    sPrevious: "Anterior"
                },
            }

        });
    });
</script>
@endpush
@include('admin.ema.create')
  <script type="text/javascript">
  	$('.datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true
            }
         });

    $('[data-toggle="tooltip"]').tooltip();
   </script>
@endpush