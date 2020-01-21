<div class="modal fade" id="ebas" tabindex="-1" role="dialog" aria-labelledby="ebasLabel" aria-hidden="true">
  <form method="POST" action="{{ route('admin.ebas.store', '#createeba') }}"
  enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ebasLabel">Reporte EBA (Emisión Bimestral Anticipada)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if ($errors->any())
            <ul class="list-group">
              @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">
                  {{ $error }}
                </li>
              @endforeach
            </ul>
          @endif
          <div class="form-group {{ $errors->has('periodo') ? 'has-error' : '' }}">
            <label class="label-control">Periodo</label>
                <input type="number"
                class="form-control"
                value="{{ old('periodo', 1) }}"
                name="periodo"
                max="6"
                min="1"
                autofocus required/>
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
	                value="{{ old('desde') }}"
	                name="desde"
	                autofocus required/>
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
	                value="{{ old('hasta') }}"
	                name="hasta"
	                autofocus required/>
	             @error('hasta')
	              <div class="help-block">
	                <strong>{{ $message }}</strong>
	              </div>
	             @enderror
           </div>
           <div class="form-group {{ $errors->has('pdf') ? 'has-error' : '' }}">
             <label for="label-control">Archivo PDF</label>
             <div class="form-group form-file-upload form-file-simple">
                <input type="text" class="form-control inputFileVisible" placeholder="Selecciona Un Archivo PDF">
                <input type="file" name="pdf" class="inputFileHidden">
              </div>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button class="btn btn-info">Crear EBA</button>
        </div>
      </div>
    </div>
  </form>
</div>

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