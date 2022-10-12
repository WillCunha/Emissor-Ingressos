<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingresso;

class IngressoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dadosIngresso = [
            'name' => $request->nome_ingresso,
            'empresa_id' => 1,
            'value' => $request->valor_ingresso
        ];

        Ingresso::create($dadosIngresso);
        return response()->json([
            'status' => 200
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
