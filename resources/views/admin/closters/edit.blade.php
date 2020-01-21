@extends('layouts.dashboard')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
                @include('layouts.alerts')
				<div class="card">
                    <div class="card-body">
                    	<form id="RegisterValidation" action="{{ route('admin.closters.update', $closter) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">info</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Editar Closter</h4>
                            <div class="form-group label-floating">
                                <label class="control-label">
                                  Nombre del Closter
                                    <small>*</small>
                                </label>
                                <input class="form-control @error('name') is-invalid @else border-0 @enderror" name="name" type="name" required="true" value="{{ old('name',  $closter->name) }}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    		 <button
                             type="submit"
                             class="btn btn-info btn-fill">
                                Actualizar Closter
                            </button>
								</div>
                    	</form>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection