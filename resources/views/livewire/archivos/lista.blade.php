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
<div class="form-row p-4">
    <div class="form-group col-md-10">
        <h2>Mis archivos</h2>
    </div>

    <div class="form-group col-md-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            <i style="font-size: 20px" class="fas fa-file-upload"></i>&nbsp; Nuevo Archivo
        </button>
    </div>
    @include('livewire.archivos.subir')
</div>
<hr>

<div class="form-row p-4">
    @php
        $extension = [];
    @endphp

    @foreach ($archivos as $archivo)
        @php
            $extension = substr($archivo->nombre, -3);
        @endphp
        <div class="form-group col-md-4">
            <div class="card p-2 text-white bg-light mb-3" style="width: 18rem;">

                @if ($extension == 'pdf')

                <embed width="50px" height="150px" src='{{  asset('storage/'.$archivo->nombre)}}' type='application/pdf' class="card-img-top" alt="...">

                @elseif ($extension == 'zip')

                <div class="card-header" style="height: 150px; ">
                    <h6 class="text-dark">My archivo ZIP</h6>
                    <div class="text-center">
                        <i style="font-size: 100px" class="fas fa-file-archive text-warning"></i>
                    </div>
                </div>
                @elseif ($extension == 'ocx')

                <div class="card-header" style="height: 150px; ">
                    <h6 class="text-dark">My archivo Word</h6>
                    <div class="text-center">
                        <i style="font-size: 100px" class="fas fa-file-alt text-primary"></i>
                    </div>
                </div>

                @elseif ($extension == 'lsx')

                <div class="card-header" style="height: 150px; ">
                    <h6 class="text-dark">My archivo Excel</h6>
                    <div class="text-center">
                        <i style="font-size: 100px" class="fas fa-file-excel text-success"></i>
                    </div>
                </div>


                @else

                <img width="50px" height="150px" src="{{  asset('storage/'.$archivo->nombre)}}" class="card-img-top" alt="...">

                @endif

                <div class="card-body">
                    <div class="text-center">
                        <a type="button" href="{{  asset('storage/'.$archivo->nombre)}}" target="_blank" class="btn btn-primary btn-block btn-sm">
                            Ver
                        </a>
                        <button class="btn btn-danger btn-sm btn-block" wire:click='delete({{ $archivo->id }})'>
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>




