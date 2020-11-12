@if (session('mensaje'))
    <div id="alert" class="alert alert-success container justify-content-center text-center mt-2" role="alert">
        {{ session('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('mensaje2'))
    <div id="alert" class="alert alert-danger container justify-content-center text-center mt-2" role="alert">
        {{ session('mensaje2') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="form-row">
    <div class="form-group col-md-4">
        @foreach ($planPersonal as $plan)
        <div class="card bg-light mb-6">
            <div class="card-header"><h2>Actualizar plan</h2></div>
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        Recuerda que tu plan vente {{ $plan->fechaFinal }}, y al caducar
                        todos tus archivos guardados se borraran, actualiza el plan para no perder tus archivos!
                      </div>
                      <h6>Numero de meses que quieres agregar a tu plan</h6>
                      <div class="row">
                          <div class="col-12">
                            <h1>{{ $count }}</h1>
                          </div>
                          <div class="col-6">
                            <button class="btn btn-danger btn-sm" wire:click="disminuirPlan">-</button>
                            <button class="btn btn-primary btn-sm" wire:click="incrementPlan">+</button><br>
                          </div>
                          <div class="col-6">
                            <button class="btn btn-success btn-sm btn-block" wire:click="update({{ $plan->id }})">Agregar</button>
                          </div>
                      </div>
                </div>
            </div>
            @endforeach
        </div>

        {{ $fechaFinal }}
    <div class="form-group col-md-8">
    @foreach ($planPersonal as $plan)
    <div class="card bg-light mb-6">
        <div class="card-header"><h2>Informacion de mi plan</h2></div>
        <div class="card-body">
            <h5>Titular del plan : {{ Auth::user()->name }}</h5>
            <br>
            <h5>Correo del titular : {{ Auth::user()->email }}</h5>
            <br>
            <h5>Fecha de adquisición  : {{ $plan->fechaInicio }}</h5>
            <br>
            <h5>Fecha de vencimiento del plan : {{ $plan->fechaFinal }}</h5>
        </div>
    </div>
    @endforeach
    </div>

</div>
