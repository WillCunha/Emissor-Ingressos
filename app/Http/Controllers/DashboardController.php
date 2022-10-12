<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Empresa;
use App\Models\Ingresso;
use App\Models\IngressosEvento;

class DashboardController extends Controller
{

    public function index()
    {
        if(session()->has('login')){

            $eventos = Evento::where('empresa_id', 1)->get();
            return view('dashboard.inicio', compact('eventos'));
        }else{
            return redirect('/');
        }
    }

    public function dashboard()
    {
        if(session()->has('login')){
            //$empresa = Empresa::where('id', 1)->first();
            //$evento = $empresa->eventos()->get();

            //if($evento){
                //echo "<h1>Eventos da empresa: ". $empresa->name ."</h1>";
                //foreach($evento as $eventos){
                    //echo "<p>". $eventos->nomeEvento ."</p>";
            //}

            //}

            $dadosIngressos = Ingresso::where('empresa_id', 1)->get();
            $buscaDados = Evento::where('empresa_id', 1)->get();
            return view('dashboard.dashboard', compact(['buscaDados', 'dadosIngressos']));
        }else{
            return redirect('/');
        }

    }
}
