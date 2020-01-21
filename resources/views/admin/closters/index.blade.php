@extends('layouts.dashboard')
@section('navTitle', 'WCM | Closters')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="blue">
		                <i class="material-icons">group_work</i>
		            </div>
		            <div class="card-content">
		            	<h4 class="card-title">Closters | Panel de Control</h4>
		            </div>
		            @include('layouts.alerts')
		            <div class="row">
						<div class="col-md-12 col-xs-12 col-sm-4">
							<div class="toolbar">
	                            <button data-toggle="modal"
	                                    data-target="#closter" class="btn btn-info pull-right"><i class="fa fa-plus"></i>
	                            Crear Closter</button>
                        	</div>
                    		<div class="material-datatables">
                            <h4 class="card-title text-center">Listado de Closters</h4>
                    			<table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%" id="datatables">
                    				<thead>
                    					<tr>
                    						<th>ID</th>
                    						<th>Nombre</th>
                    						<th>Acciones</th>
                    					</tr>
                    				</thead>
                    				<tbody>
                    					@foreach ($closters as $closter)
	                                    <tr>
	                                        <td>
	                                           {{ $closter->id }}
	                                        </td>
	                                        <td>
	                                        	{{ $closter->name }}
	                                        </td>
	                                        <td>
	                                        	<form action="{{ route('admin.closters.destroy', $closter) }}" method="POST">
	                                        		@csrf
	                                        		@method('DELETE')
	                                        	<a class="btn btn-just-icon btn-simple btn-twitter" href="{{ route('admin.closters.edit', $closter) }}"><i class="fa fa-edit"></i>
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
					</div>
					<hr>
					<br>
					<div class="row">
						<div class="col-md-12 col-xs-12 col-sm-4">
                            <h4 class="card-title text-center">Listado de Closters Inhabilitados</h4>
                    		<div class="material-datatables">
                    			<table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%"
                    				id="datatables1">
                    				<thead>
                    					<tr>
                    						<th>ID</th>
                    						<th>Nombre</th>
                    						<th>Acciones</th>
                    					</tr>
                    				</thead>
                    				<tbody>
                    					@foreach ($clostersDelete as $closter)
	                                    <tr>
	                                        <td>
	                                           {{ $closter->id }}
	                                        </td>
	                                        <td>
	                                        	{{ $closter->name }}
	                                        </td>
	                                        <td>
	                                        	@if (auth()->user()->isAdmin())
	                                        	<form class="col-md-1"
	                                        	action="{{ route('admin.closters.restore', $closter->id) }}" method="POST">
	                                        		@csrf
	                                        	<button
	                                        	class="btn btn-just-icon btn-simple btn-twitter"
	                                        	onclick="return confirm('Estas seguro de Eliminar este registro?')">
	                                        	<i class="material-icons">library_add</i>
	                                        	</button>
	                                        	</form>
	                                        	<form class="col-md-1"
	                                        	action="{{ route('admin.closters.forceDelete', $closter->id) }}" method="POST">
	                                        		@csrf
	                                        	<button
	                                        	class="btn btn-just-icon btn-simple btn-youtube"
	                                        	onclick="return confirm('Estas seguro de Eliminar este registro permanentemente?')">
	                                        	<i class="material-icons">delete_forever</i>
	                                        	</button>
	                                        	</form>
	                                        	@endif
	                                        </td>
	                                    </tr>
                    					@endforeach
	                                </tbody>
                    			</table>
                    		</div>
                    	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables1').DataTable({
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