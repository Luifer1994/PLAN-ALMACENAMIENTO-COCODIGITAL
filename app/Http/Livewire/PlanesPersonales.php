<?php

namespace App\Http\Livewire;

use App\Models\Planes;
use App\Models\Planes_cliente;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PlanesPersonales extends Component
{
    public  $id_plan, $id_usuario, $fechaInicio, $fechaFinal;
    public $count = 0;



    public function render()
    {
        $planPersonal = Planes_cliente::where('id_usuario', Auth::user()->id)->get();
        return view('livewire.planes-personales', compact('planPersonal'));
    }

    public function incrementPlan()
    {
        $this->count++;
    }

    public function disminuirPlan()
    {
        $this->count--;
    }

    public function update($id)
    {
        $planPersonal = Planes_cliente::find($id);

        $fechaFinal = Planes_cliente::select('planes_clientes.*')->where('id_usuario','=', Auth::user()->id)
        ->get();

        foreach ($fechaFinal as $fecha) {

            $ff = date_create($fecha->fechaFinal);

            $planPersonal->update([
                'fechaFinal' => date_add($ff, date_interval_create_from_date_string($this->count." months"))
            ]);

        }
        if ($this->count > 0) {
            session()->flash('mensaje', 'Has aumentado '.$this->count.' meses a tu plan');
        }else {
            session()->flash('mensaje2', 'Error debes por lo menos agregar 1 mes al plan');
        }


        $this->default();


    }

    public function default()
    {
        $this->fechaFinal    = "";
        $this->fechaInicio   = "";
        $this->count = 0;
    }
}
