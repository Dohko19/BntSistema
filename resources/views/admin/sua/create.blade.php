@extends('layouts.dashboard')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
	                <div class="card-body">
	                @if ($errors->any())
	                    <ul class="list-group">
	                      @foreach ($errors->all() as $error)
	                        <li class="list-group-item list-group-item-danger">
	                          {{ $error }}
	                        </li>
	                      @endforeach
	                    </ul>
	                @endif
	                        <div class="card-header card-header-icon" data-background-color="blue">
	                            <i class="material-icons">mail_outline</i>
	                        </div>
	                        <div class="card-content">
	                            <h4 class="card-title">Crear nuevo usuario</h4>
	                    <form action="{{ route('admin.suas.store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                          @csrf
							       <div class="form-group {{ $errors->has('num_mes') ? 'has-error' : '' }}">
					            <label class="label-control">Numero de Mes</label>
					                <input type="number"
					                class="form-control"
					                value="{{ old('num_mes', 1) }}"
					                name="num_mes"
					                max="12"
					                min="1"
					                autofocus required/>
					                @error('num_mes')
						              <div class="help-block">
						                <strong>{{ $message }}</strong>
						              </div>
						            @enderror
					          </div>
                     <div class="{{ $errors->has('month') ? 'has-error' : '' }}">
                        <div class="col-lg-5 col-md-6 col-sm-3">
                            <select class="selectpicker" data-style="btn btn-info btn-round" title="Selecciona un mes" data-size="7" name="month" required autofocus>
                                <option value="enero">
                                    Enero
                                </option>
                                <option value="Febrero">
                                    Febrero
                                </option>
                                <option value="Marzo">
                                    Marzo
                                </option>
                                <option value="Abril">
                                    Abril
                                </option>
                                <option value="Mayo">
                                    Mayo
                                </option>
                                <option value="Junio">
                                    Junio
                                </option>
                                <option value="Julio">
                                    Julio
                                </option>
                                <option value="Agosto">
                                    Agosto
                                </option>
                                <option value="Septiembre">
                                    Septiembre
                                </option>
                                <option value="Octubre">
                                    Octubre
                                </option>
                                <option value="Noviembre">
                                    Noviembre
                                </option>
                                <option value="Diciembre">
                                    Diciembre
                                </option>
                            </select>
                            @error('month')
                                <div class="help-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div><br><br><br>
                     <div class="form-group">
                      <label class="">Año</label>
                          <input type="number"
                            class="form-control"
                            value="{{ old('month') }}"
                            name="year"
                            lang="es"
                            max="12"
                            min="1"
                            autofocus required/>
                         @error('month')
                          <div class="help-block">
                            <strong>{{ $message }}</strong>
                          </div>
                        @enderror
                     </div>
                     <div class="form-group {{ $errors->has('cedula_determinacion_cuotas') ? 'has-error' : '' }}">
                       <label for="label-control">Cedula de Determicion de Cuotas</label>
                       <div class="form-group form-file-upload form-file-simple">
                          <input
                          type="text"
                          class="form-control inputFileVisible"
                          placeholder="Selecciona archivo para Cedula de Determicion de Cuotas"
                          value="{{ old('cedula_determinacion_cuotas') }}">
                          <input type="file"
                          name="cedula_determinacion_cuotas"
                          class="inputFileHidden"
                          value="{{ old('cedula_determinacion_cuotas') }}">
                        </div>
                     </div>
                     <div class="form-group {{ $errors->has('resumen_liquidacion') ? 'has-error' : '' }}">
                       <label for="label-control">Resumen Liquidación</label>
                       <div class="form-group form-file-upload form-file-simple">
                          <input type="text" class="form-control inputFileVisible" placeholder="Selecciona archivo para resumen liquidación" value="{{ old('resumen_liquidacion') }}">
                          <input type="file" name="resumen_liquidacion" class="inputFileHidden" value="{{ old('resumen_liquidacion') }}">
                        </div>
                     </div>
                     <div class="form-group {{ $errors->has('pago_sua') ? 'has-error' : '' }}">
                       <label for="label-control">Pago SUA</label>
                       <div class="form-group form-file-upload form-file-simple">
                          <input type="text" class="form-control inputFileVisible" placeholder="Selecciona archivo para pago SUA" value="{{ old('pago_sua') }}">
                          <input type="file" name="pago_sua" class="inputFileHidden" value="{{ old('pago_sua') }}">
                        </div>
                     </div>
                     <button class="btn btn-info">Crear</button>
	                	</form>
	                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')
<script>
    if(window.location.hash === '#createeba')
    {
      $('#ebas').modal('show');
    }

    $('#ebas').on('hide.bs.modal', function(){
     window.location.hash = '#';
    });

    $('#ebas').on('shown.bs.modal', function(){
      $('#ebas-name').focus();
     window.location.hash = '#createeba';
    });
  </script>

  <script>
  // FileInput
  $('.form-file-simple .inputFileVisible').click(function() {
    $(this).siblings('.inputFileHidden').trigger('click');
  });

  $('.form-file-simple .inputFileHidden').change(function() {
    var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
    $(this).siblings('.inputFileVisible').val(filename);
  });

  $('.form-file-multiple .inputFileVisible, .form-file-multiple .input-group-btn').click(function() {
    $(this).parent().parent().find('.inputFileHidden').trigger('click');
    $(this).parent().parent().addClass('is-focused');
  });

  $('.form-file-multiple .inputFileHidden').change(function() {
    var names = '';
    for (var i = 0; i < $(this).get(0).files.length; ++i) {
      if (i < $(this).get(0).files.length - 1) {
        names += $(this).get(0).files.item(i).name + ',';
      } else {
        names += $(this).get(0).files.item(i).name;
      }
    }
    $(this).siblings('.input-group').find('.inputFileVisible').val(names);
  });

  $('.form-file-multiple .btn').on('focus', function() {
    $(this).parent().siblings().trigger('focus');
  });

  $('.form-file-multiple .btn').on('focusout', function() {
    $(this).parent().siblings().trigger('focusout');
  });
  </script>
@endpush