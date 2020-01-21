@extends('layouts.dashboard')
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
                    	<h4 class="card-title">Perfil de Usuario</h4>
                    </div>
                    @include('layouts.alerts')
                    <div class="card-body">
						<div class="card-profile">
                            <h6 class="category text-gray">
                                Role:
                                @foreach($user->roles as $role)
                                    {{ $role->display_name }}
                                @endforeach
                            </h6>
                            <h4 class="card-title">Nombre: {{ $user->name }}</h4>
                            <p class="description">
                                Correo Electronico: {{ $user->email }}
                            </p>
                            <h4 class="card-title">
                                Closter: {{ $user->closters->name ?? 'Sin asignar' }}
                            </h4>
                            <h4 class="card-title">
                                Marca: {{ $user->marcas->name ?? 'Sin asignar' }}
                            </h4>
                            @can('edit', $user)
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-info btn-round">Editar Perfil</a>
                            @endcan
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection