@extends('layouts.dashboard')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">supervised_user_circle</i>
                    </div>
                    <div class="card-content">
                    	<h4 class="card-title">Inicio | Panel de Control</h4>
                    </div>
                    @include('layouts.alerts')
                    <div class="row">
                    	@if (auth()->user()->isAdmin())
                    	<div class="col-md-12">
                    		<a href="{{ route('admin.users.create') }}" class="btn btn-info pull-right">Crear Usuario</a>
                            <h4 class="card-title text-center">Listado de Usuarios</h4>
                    		<div class="material-datatables">
                    			<table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%" id="datatables">
                    				<thead>
                    					<tr>
                    						<th>ID</th>
                    						<th>Nombre</th>
                    						<th>Email</th>
                    						<th>Acciones</th>
                    					</tr>
                    				</thead>
                    				<tbody>
                    					@foreach ($users as $user)
	                                    <tr>
	                                        <td>
	                                           {{ $user->id }}
	                                        </td>
	                                        <td>
	                                        	<a href="{{ route('admin.users.show', $user) }}">
	                                        		{{ $user->name }}
	                                        	</a>
	                                        </td>
	                                        <td>
	                                            {{ $user->email }}
	                                        </td>
	                                        <td>
	                                        	<form action="{{ route('admin.users.destroy', $user) }}" method="POST">
	                                        		@csrf
	                                        		@method('DELETE')
	                                        	<a class="btn btn-info btn-round btn-fab btn-fab-mini" href="{{ route('admin.users.edit', $user) }}"><i class="material-icons">edit</i></a>
	                                        	<button class="btn btn-danger btn-round btn-fab btn-fab-mini" onclick="return confirm('Estas seguro de Eliminar este Usuario?')"><i class="material-icons">delete_forever</i></button>
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
	</div>
</div>
@endsection
@push('scripts')
	<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
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