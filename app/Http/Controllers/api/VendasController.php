<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendas;
use App\Models\IngressosEvento;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = IngressosEvento::all();
        return $data;
    }

    public function show($id)
    {
        $data = IngressosEvento::where('evento_id', $id)->get();
        return $data;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;
        $user_id = 1;
        $quantidade = $request->quantidade;
        $vlrUnitario = $request->unitario;
        $total = $quantidade * $vlrUnitario;

            $detalhaIngresso = IngressosEvento::find($id);
            $quantidadeIngresso = $detalhaIngresso->quantidade_disponivel;
            $totalIngressos = $quantidadeIngresso - $quantidade;
            $dadosIngresso = [
                'quantidade_disponivel' => $totalIngressos
            ];
            IngressosEvento::where('id', $id)->update($dadosIngresso);


            return response("Tarefa concluída.");
    }


}
