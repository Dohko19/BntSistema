@extends('layouts.dashboard')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
                @include('layouts.alerts')
				<div class="card">
                    <div class="card-body">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">mail_outline</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Editar usuario</h4>
                    	   <form
                           action="{{ route('admin.users.update', $user) }}"
                           method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group label-floating">
                                    <label class="control-label">
                                       Nombre
                                        <small>*</small>
                                    </label>
                                    <input class="form-control @error('name') is-invalid @else border-0 @enderror" name="name" type="text"  value="{{ old('name',  $user->name) }}" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">
                                       Direccion de Email
                                        <small>*</small>
                                    </label>
                                    <input class="form-control @error('email') is-invalid @else border-0 @enderror" name="email" type="email"  value="{{ old('name',  $user->email) }}" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group label-floating @error('marca_id') is-invalid @else border-0 @enderror">
                                    <label class="control-label">
                                       Marca
                                        <small>*</small>
                                    </label>
                                    <div class="row">
                                        <div class="{{ $errors->has('marca_id') ? 'has-error' : '' }}">
                                           <div class="col-lg-5 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="btn btn-primary btn-round" title="Selecciona Una Marca" data-size="7" name="marca_id">
                                                    @foreach ($marcas as $marca)
                                                    <option value="{{ $marca->id }}"
                                                        {{ old('marca_id', $user->marca_id) == $marca->id ? 'selected' : ''}}>
                                                        {{ $marca->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('marca_id')
                                                    <div class="help-block">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="{{ $errors->has('closter_id') ? 'has-error' : '' }}">
                                            <div class="col-lg-5 col-md-6 col-sm-3">
                                                <select class="selectpicker" data-style="btn btn-primary btn-round" title="Selecciona un closter" data-size="7" name="closter_id" >
                                                    @foreach ($closters as $closter)
                                                    <option value="{{ $closter->id }}"
                                                        {{ old('closter_id', $user->closter_id) == $closter->id ? 'selected' : ''}}>
                                                        {{ $closter->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('closter_id')
                                                    <div class="help-block">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">
                                        Contraseña
                                        <small>*</small>
                                    </label>
                                    <input class="form-control @error('password') is-invalid @else border-0 @enderror" name="password" type="password"/>
                                    <small>Dejar en blanco para no actualizar Contraseña</small>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">
                                        Repite Contraseña
                                        <small>*</small>
                                    </label>
                                    <input class="form-control" name="password_confirmation" type="password">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="category form-category">
                                    <small>*</small> Campos requeridos
                                </div>
                                @if (auth()->user()->isAdmin())
                                <div class="form-footer text-right">
                                    <div class="checkbox pull-left">
                                        @foreach ($roles as $id => $name)
                                            <label>
                                                <input type="checkbox" name="roles[]"

                                                value="{{ $id }}"
                                                {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
                                                >
                                                {{ $name }}
                                            </label>
                                        @endforeach
                                    </div>
                                @endif
                    		 <button type="submit" class="btn btn-info btn-fill">Actualizar</button>
								</div>
                    	</form>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
	<script type="text/javascript">
    function setFormValidation(id) {
        $(id).validate({
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });
    }

    $(document).ready(function() {
        setFormValidation('#RegisterValidation');
        setFormValidation('#TypeValidation');
        setFormValidation('#LoginValidation');
        setFormValidation('#RangeValidation');
    });
</script>
@endpush