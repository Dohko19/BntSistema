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
					          <div class="form-group">
								      <label class="">Mes</label>
					                <input type="text"
						                class="form-control datepickerMonth"
						                value="{{ old('month') }}"
						                name="month"
						                lang="es"
						                autofocus required/>
						             @error('month')
						              <div class="help-block">
						                <strong>{{ $message }}</strong>
						              </div>
						            @enderror
					           </div>
                     <div class="form-group">
                      <label class="">Año</label>
                          <input type="text"
                            class="form-control datepickerYear"
                            value="{{ old('month') }}"
                            name="year"
                            lang="es"
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
                          <input type="text" class="form-control inputFileVisible" placeholder="Selecciona archivo para Cedula de Determicion de Cuotas" value="{{ old('cedula_determinacion_cuotas') }}">
                          <input type="file" name="cedula_determinacion_cuotas" class="inputFileHidden" value="{{ old('cedula_determinacion_cuotas') }}">
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

  <script type="text/javascript">
  	$('.datepickerMonth').datetimepicker({
  		 	timeZone: 'America/Mexico_City',
            format: 'MM',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true
            },
         });

    $('.datepickerYear').datetimepicker({
            timeZone: 'America/Mexico_City',
                format: 'YY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove',
                    inline: true
                },
             });

    $('[data-toggle="tooltip"]').tooltip();
   </script>
@endpush