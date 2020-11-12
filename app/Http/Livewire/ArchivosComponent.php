<?php

namespace App\Http\Livewire;

use App\Models\Archivos;
use App\Models\Planes_cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ArchivosComponent extends Component
{
    public  $nombre=[], $id_usuario, $id_planCliente;

    use WithFileUploads;

    public function render()
    {
        $planCliente = Planes_cliente::select('planes_clientes.*')
        ->where('id_usuario', '=', Auth::user()->id)->get();

        foreach ($planCliente as $plan) {

            if ($plan->fechaFinal < Date('Y-m-d')) {

                $archivo = Archivos::select('archivos.*')
                ->where('id_usuario', '=', Auth::user()->id)->get();

                foreach ($archivo as $key ) {

                    Storage::disk('public')->delete($key->nombre);
                    Archivos::where('id_usuario',$key->id_usuario)->delete();
                }
            }

        }

        $archivos = Archivos::where('id_usuario', '=', Auth::user()->id)->get();
        return view('livewire.archivos-component', compact('archivos'));
    }

    public function store()
    {

        $this->validate([
            'nombre' => 'required|max:100000000000',
        ]);

        //GUARDAR ARCHIVO
        foreach ($this->nombre as $nombre) {

            $filename = $nombre->store('archivos/'.Auth::user()->id,'public');

            $planesC = DB::table('planes_clientes')->where('id_usuario', '=', Auth::user()->id)->get();

            if (Planes_cliente::where('id_usuario', '=', Auth::user()->id)->count() > 0) {

                foreach ($planesC as  $value) {

                    // CREAMOS UN NUEVO REGISTRO
                    $newArchivo = Archivos::create([
                    'nombre'        => $filename,
                    'id_usuario'    => Auth::user()->id,
                    'id_planCliente'  => $value->id_usuario,
                ]);
                }

                $this->nombre = "";


                //DESPUES DE CREADO MANDAMOS UN MENSAJE DE CONFIRMACION
                session()->flash('mensaje', 'ARCHIVO SUBIDO CON EXITO');



            }else {
                session()->flash('mensaje2', 'Error¡¡ el archivo no se puede subir por que usted no tiene un plan activo');
            }

            // CERRAMOS EL MODAL DE REGISTRO
            $this->emit('store');
        }
    }

    public function delete($id)
    {
        $archivo = Archivos::find($id);

        Storage::disk('public')->delete($archivo->nombre);
        $archivo->delete();

        session()->flash('mensaje', 'ARCHIVO ELIMINADO CON EXITO');

    }
}
