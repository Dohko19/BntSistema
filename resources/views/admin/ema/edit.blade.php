@extends('layouts.dashboard')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
                @include('layouts.alerts')
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
	                	<form action="{{ route('admin.emas.update', $ema) }}" method="POST"
	                		enctype="multipart/form-data">
	                        @csrf
	                        @method('PUT')
	                        <div class="card-header card-header-icon" data-background-color="blue">
	                            <i class="material-icons">info</i>
	                        </div>
	                        <div class="card-content">
	                            <h4 class="card-title">Editar EMA</h4>
	                        	<div class="form-group {{ $errors->has('periodo') ? 'has-error' : '' }}">
					            	<label class="label-control">Periodo</label>
					                <input type="text"
					                class="form-control datepicker"
					                value="{{ old('periodo', $ema->periodo ? $ema->periodo->format('m/d/y') : null ) }}"
					                name="periodo"
					                required/>
					                @error('periodo')
						              <div class="help-block">
						                <strong>{{ $message }}</strong>
						              </div>
						            @enderror
					            </div>
					            <h4>Fecha Correspondiente</h4>
						       <div class="form-group">
								      <label class="">Desde</label>
					                	<input type="text"
						                class="form-control datepicker"
						                value="{{ old('desde', $ema->desde ? $ema->desde->format('m/d/y') : null) }}"
						                name="desde"
						                required/>
						             @error('desde')
						              <div class="help-block">
						                <strong>{{ $message }}</strong>
						              </div>
						            @enderror
					           </div>
						        <div class="form-group {{ $errors->has('hasta') ? 'has-error' : '' }}">
								      <label class="">Hasta</label>
					                <input type="text"
						                class="form-control datepicker"
						                value="{{ old('hasta', $ema->hasta ? $ema->hasta->format('m/d/y') : null) }}"
						                name="hasta"
						                required/>
						             @error('hasta')
						              <div class="help-block">
						                <strong>{{ $message }}</strong>
						              </div>
						             @enderror
					           </div>
					           <div class="form-group {{ $errors->has('pdf') ? 'has-error' : '' }}">
					             <label for="label-control">Archivo PDF</label>
					             <div class="form-group form-file-upload form-file-simple">
					                <input type="text" class="form-control inputFileVisible" placeholder="Selecciona Un Archivo PDF" value="{{ old('pdf', $ema->pdf) }}">
					                <input type="file" name="pdf" class="inputFileHidden" value="{{ old('pdf', $ema->pdf) }}">
					              </div>
					           </div>
	                		 <button
	                         type="submit"
	                         class="btn btn-info btn-fill">
	                            Actualizar
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
@push('scripts')


<script type="text/javascript">
  	$('.datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
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
            }
         });
   </script>
@endpush