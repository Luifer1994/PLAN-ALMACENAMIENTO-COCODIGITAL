<?php

namespace App\Http\Controllers;

use App\Models\Archivos;
use App\Models\Planes;
use App\Models\Planes_cliente;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $planes = Planes::all();
        return view('welcome', compact('planes'));

    }

    public function dashboard()
    {
        return view('livewire.archivos.index');
    }

    public function planPersonal()
    {
        return view('livewire.planesPersonales.index');
    }

    public function miPlan($id)
    {
        if (Planes_cliente::where('id_usuario', '=', Auth::user()->id)->count() == 0) {
            $fecha_actual = Date('Y-m-d');
            $fechaFinal= "";

            if ($id==1)
            {
                $fechaFinal = Date('Y-m-d',strtotime($fecha_actual."+ 1 month"));
            }
            elseif ($id==2)
            {
                $fechaFinal = Date('Y-m-d',strtotime($fecha_actual."+ 6 month"));
            }
            else {
                $fechaFinal = Date('Y-m-d',strtotime($fecha_actual."+ 1 year"));
            }


            $planes = DB::table('planes')->where('id', '=', $id)->get();

            foreach ($planes as $plan ) {

                $planCliente = new Planes_cliente();

                $planCliente->id_plan       = $plan->id;
                $planCliente->id_usuario    = Auth::user()->id;
                $planCliente->fechaInicio   = Date('Y-m-d');
                $planCliente->fechaFinal    = $fechaFinal;

                $planCliente->save();

                return redirect('/mis-archivos');
            }
        }

            return back()->with('mensaje', 'Usted ya tiene un plan de almacenamiento, entra a tu espacio para disfrutar de tu plan');
    }
}
