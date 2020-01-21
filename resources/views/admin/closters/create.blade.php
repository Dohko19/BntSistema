<div class="modal fade" id="closter" tabindex="-1" role="dialog" aria-labelledby="closterLabel" aria-hidden="true">
  <form method="POST" action="{{ route('admin.closters.store', '#createCloster') }}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="closterLabel">Nombre del Closter</h5>
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
          <div class="form-group {{ $errors->has('closter') ? 'has-error' : '' }}">
            {{-- <label for="">Titulo de la publicacion</label> --}}
            <input id="closter-name" name="name" type="text" class="form-control" placeholder="Ingresa el nombre del closter" value="{{ old('closter') }}" autofocus required>
            @error('closter')
              <div class="help-block">
                <strong>{{ $message }}</strong>
              </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-info">Crear Closter</button>
        </div>
      </div>
    </div>
  </form>
</div>

@push('scripts')
  <script>
    if(window.location.hash === '#createCloster')
    {
      $('#closter').modal('show');
    }

    $('#closter').on('hide.bs.modal', function(){
     window.location.hash = '#';
    });

    $('#closter').on('shown.bs.modal', function(){
      $('#closter-name').focus();
     window.location.hash = '#createCloster';
    });
  </script>
@endpush