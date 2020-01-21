@extends('layouts.dashboard')
@section('navTitle', 'WCM | Nomina')
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
                        <h4 class="card-title"> Descarga de recibos de nómina</h4>
                        <div class="toolbar">
                            <a href="#"
                                    class="btn btn-primary"
                                    data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="fa fa-plus"></i>
                                        Agregar Recibo de Nomina
                                </a>
                        </div>
                        <div class="material-datatables">
                            <table id="datatablesNomina" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NSS</th>
                                        <th>Nombre</th>
                                        <th>Closter</th>
                                        <th>Tienda</th>
                                        <th>Recibo Nomina</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recibosnomina as $recibosnomina)
                                        <tr>
                                            <td>
                                               {{ $recibosnomina->nss }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.recibosnomina.show', $recibosnomina) }}">
                                                    {{ $recibosnomina->nombre }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $recibosnomina->closters->name ?? 'Tienda elimiada o no disponible' }}
                                            </td>
                                            <td>
                                                {{ $recibosnomina->marcas->name ?? 'Marca elimiada o no disponible' }}

                                            </td>
                                            <td>
                                                <a data-toggle="tooltip" data-placement="top" title="Descargar" class="btn btn-sm btn-just-icon btn-simple btn-twitter" target="_blank" href="{{ url('/recibos/nomina/'.$recibosnomina->recibo_nomina) }}">
                                                    <i class="fa fa-download">
                                                    </i></a>
                                                @can('delete', $recibosnomina)
                                                <form style="display: inline;" action="{{ route('admin.recibosnomina.destroy', $recibosnomina) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <a data-toggle="tooltip" data-placement="top" title="Editar Registro" class="btn btn-sm btn-just-icon btn-simple btn-github" href="{{ route('admin.recibosnomina.edit', $recibosnomina) }}"  ><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-sm btn-just-icon btn-simple btn-youtube" onclick="return confirm('Estas seguro de Eliminar esta publicacion?')"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Borrar Registro"></i></button>
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
        $('#datatablesNomina').DataTable({
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
    $('[data-toggle="tooltip"]').tooltip();
</script>
@endpush