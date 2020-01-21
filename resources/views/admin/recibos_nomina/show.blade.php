@extends('layouts.dashboard')
@section('navTitle', 'WCM | Nomina')
@section('content')
	<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="red">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                    	<h4 class="card-title">Recibos de Nomina</h4>
                    </div>
                    @include('layouts.alerts')
                    <div class="card-body">
						<div class="card-profile">
                            <div class="card-content">
                                <h6 class="category text-gray">Nombre del Cliente: {{ $recibosnomina->nombre }}</h6>
                                <h4 class="card-title">Numero de Seguro Social: {{ $recibosnomina->nss }}</h4>
                                <p class="description">
										Closter: {{ $recibosnomina->closters->name }}
                                </p>
                                <p class="description">Tienda: {{ $recibosnomina->marcas->name }}</p>
                                <p>Recibo de Nomina: <a target="_blank" href="{{ url('recibos/nomina/'.$recibosnomina->recibo_nomina) }}"><i class="material-icons">picture_as_pdf</i> Ver Recibo</a></p>
                                @can('edit', $recibosnomina)
                                <a href="{{ route('admin.recibosnomina.edit', $recibosnomina) }}" class="btn btn-info btn-round">Editar Perfil</a>
                                @endcan
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection