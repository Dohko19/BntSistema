@extends('layouts.dashboard')
@section('navTitle', 'WCM | Marcas')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        @if(auth()->user()->isAdmin() || auth()->user()->isCliente())
                            <div class="toolbar">
                                <a href="#"
                                    class="btn btn-info pull-right"
                                    data-toggle="modal"
                                    data-target="#marca">
                                    <i class="fa fa-plus"></i>
                                        Agregar Marca
                                </a>
                            </div>
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">group_work</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title text-center">Marcas</h4>
                            </div>

                            <div class="material-datatables">
                                <table id="datatablesMarcas" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($marcas as $marca)
                                        <tr>
                                            <td>
                                               {{ $marca->id }}
                                            </td>
                                            <td>
                                                {{ $marca->name }}
                                            </td>
                                            <td>
                                                <form
                                                action="{{ route('admin.marcas.destroy', $marca) }}"
                                                method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <a class="btn btn-just-icon btn-simple btn-twitter" href="{{ route('admin.marcas.edit', $marca) }}"><i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-just-icon btn-simple btn-youtube" onclick="return confirm('Estas seguro de Eliminar esta publicacion?')"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                </div>
            </div>
    </div>
</div>
@endsection
@push('scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#datatablesMarcas').DataTable({
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
