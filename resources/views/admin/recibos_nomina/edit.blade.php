@extends('layouts.dashboard')
@section('navTitle', 'WCM | Editar Nomina')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-6">
				<div class="card">
                    <div class="card-body">
                    		<div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">mail_outline</i>
                            </div>

                    	<form action="{{ route('admin.recibosnomina.update', $recibosnomina) }}" method="POST" enctype="multipart/form-data">
                    		@if ($errors->any())
		                        <ul class="list-group">
		                          @foreach ($errors->all() as $error)
		                            <li class="list-group-item list-group-item-danger">
		                              {{ $error }}
		                            </li>
		                          @endforeach
		                        </ul>
		                    @endif
                    		@csrf
                    		@method('PUT')
                            <div class="card-content">
                                <h4 class="card-title">Editar Recibos de Nomina</h4>
	                    		<div class="form-group label-floating">
								    <label class="control-label">
								       Nombre
								        <small>*</small>
								    </label>
								    <input class="form-control @error('nombre') is-invalid @else border-0 @enderror" name="nombre" type="text"  value="{{ old('nombre',  $recibosnomina->nombre) }}" required/>
								    @error('nombre')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

	                    		<div class="form-group label-floating">
								    <label class="control-label">
								       NSS(Numero de Seguro Social)
								        <small>*</small>
								    </label>
								    <input class="form-control @error('nss') is-invalid @else border-0 @enderror" name="nss" type="text"  value="{{ old('nss',  $recibosnomina->nss) }}" required/>
								    @error('nss')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="{{ $errors->has('marca_id') ? 'has-error' : '' }}">
						           <div class="col-lg-5 col-md-6 col-sm-3">
						                <select class="selectpicker" data-style="btn btn-primary btn-round" title="Selecciona Una Marca" data-size="7" name="marca_id" required="true">
						                    @foreach ($marcas as $marca)
						                    <option value="{{ $marca->id }}"
						                        {{ old('marca_id', $recibosnomina->marca_id) == $marca->id ? 'selected' : ''}}>
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
						                <select class="selectpicker" data-style="btn btn-primary btn-round" title="Selecciona un closter" data-size="7" name="closter_id" required="true">
						                    @foreach ($closters as $closter)
						                    <option value="{{ $closter->id }}"
						                        {{ old('closter_id', $recibosnomina->closter_id) == $closter->id ? 'selected' : ''}}>
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
						    <div class="row">
						    	<div class="col-md-12">
								    <div class="form-group label-floating">
									    <label for="recibo_nomina" class="control-label">
									       Recibo de Nomina
									        <small>*</small>
									    </label>
									    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
											<div class="fileinput-preview fileinput-exists card"></div>
									    	<div>
												<span class="btn btn-round btn-warning btn-file btn-xs">
		                                            <span class="fileinput-new">Agregar Archivo</span>
		                                            <span class="fileinput-exists">Change</span>
		                                            <input type="file" class="inputFileHidden" name="recibo_nomina" id="recibo_nomina" value="{{ old('recibo_nomina',  $recibosnomina->recibo_nominas) }}" required />
		                                        </span>
		                                        <br />
		                                        <a href="#" class="btn btn-danger btn-xs btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
		                                    </div>
		                                    <small class="text-muted">Archivo Obligatorio</small>
									  	</div>
									    @error('recibo_nomina')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>

						    	</div>
						    </div>
							</div>
							<button class="btn btn-info btn-block">Actualizar</button>
                    	</form>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection