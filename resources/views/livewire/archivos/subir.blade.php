<!-- Modal -->
<div wire:ignore.self class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Subir Nuevo Archivo</h5>
        </div>
        <div class="modal-body">

            <form wire:submit.prevent="store">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="file" class="form-control" wire:model='nombre' multiple>
                        @error('nombre')<p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button wire:click='store' type="submit" class="btn btn-primary">Subir</button>
        </div>
      </div>
    </div>
  </div>
