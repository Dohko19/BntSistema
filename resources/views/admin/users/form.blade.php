@csrf
<div class="form-group label-floating">
    <label class="control-label">
       Nombre
        <small>*</small>
    </label>
    <input class="form-control @error('name') is-invalid @else border-0 @enderror" name="name" type="text" required="true" value="{{ old('name',  $user->name) }}" />
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
    <input class="form-control @error('email') is-invalid @else border-0 @enderror" name="email" type="email" required="true" value="{{ old('name',  $user->email) }}" />
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
                <select class="selectpicker" data-style="btn btn-info btn-round" title="Selecciona Una Marca" data-size="7" name="marca_id" required="true">
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
                <select class="selectpicker" data-style="btn btn-info btn-round" title="Selecciona un closter" data-size="7" name="closter_id" required="true">
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
    <input class="form-control @error('password') is-invalid @else border-0 @enderror" name="password" id="registerPassword" type="password"/>
    @error('password')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>
<div class="form-group label-floating">
    <label class="control-label">
        Confirmar Contraseña
        <small>*</small>
    </label>
    <input class="form-control" name="password_confirmation" id="registerPasswordConfirmation" type="password" equalTo="#registerPassword" />
    @unless (request()->is('admin/users/create/*'))
        <small>Dejar en blanco para no actualizar Contraseña (SOLO USUARIOS NUEVOS)</small>
    @endunless
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
	            required="true"
	            value="{{ $id }}"
	            {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
                required="true">
	            {{ $name }}
	        </label>
        @endforeach
    </div>
@endif
