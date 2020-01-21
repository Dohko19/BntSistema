<div class="modal fade" id="marca" tabindex="-1" role="dialog" aria-labelledby="marcaLabel" aria-hidden="true">
  <form method="POST" action="{{ route('admin.marcas.store', '#createMarca') }}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="marcaLabel">Nombre de la Marca</h5>
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
          <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {{-- <label for="">Titulo de la publicacion</label> --}}
            <input id="marca-name" name="name" type="text" class="form-control" placeholder="Ingresa el nombre de la Marca" value="{{ old('name') }}" autofocus required>
            @error('closter')
              <div class="help-block">
                <strong>{{ $message }}</strong>
              </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button class="btn btn-info">Crear Tienda</button>
        </div>
      </div>
    </div>
  </form>
</div>

@push('scripts')
  <script>
    if(window.location.hash === '#createMarca')
    {
      $('#marca').modal('show');
    }

    $('#marca').on('hide.bs.modal', function(){
     window.location.hash = '#';
    });

    $('#marca').on('shown.bs.modal', function(){
      $('#marca-name').focus();
     window.location.hash = '#createMarca';
    });
  </script>
@endpush