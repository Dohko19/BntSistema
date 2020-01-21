<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{ route('admin.recibosnomina.store', '#create') }}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nombre:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
            {{-- <label for="">Titulo de la publicacion</label> --}}
            <input id="cliente-nombre" name="nombre" type="text" class="form-control" placeholder="Ingresa el nombre" value="{{ old('nombre') }}" autofocus required>
            @error('nombre')
              <div class="help-block">
                <strong>{{ $message }}</strong>
              </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-info">Crear Cliente</button>
        </div>
      </div>
    </div>
  </form>
</div>

@push('scripts')
  <script>
    if(window.location.hash === '#create')
    {
      $('#exampleModal').modal('show');
    }

    $('#exampleModal').on('hide.bs.modal', function(){
     window.location.hash = '#';
    });

    $('#exampleModal').on('shown.bs.modal', function(){
      $('#cliente-nombre').focus();
     window.location.hash = '#create';
    });
  </script>
@endpush