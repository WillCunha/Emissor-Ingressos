<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DateTime;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Empresa;
use App\Models\Ingresso;
use App\Models\IngressosEvento;

class GeraEvento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $idIngresso = $request->idIngresso;
        $valorIngresso = $request->valorIngresso;
        $quantidadeIngressos = $request->quantidadeMaxima;

        $file = $request->file('imagem');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $fileName);

        $data = [
            'empresa_id' => 1,
            'nomeEvento' => $request->titulo,
            'data' => $request->data,
            'quantidade' => 0,
            'local' => $request->local,
            'descricao' => $request->descricao,
            'imagem' => $fileName,
        ];

        Evento::create($data);

        $eventoId = Evento::orderBy('id', 'DESC')->first();

        for ($i=0; $i < count($idIngresso); $i++){
            $dataIngresso = [
                'ingresso_id' => $idIngresso[$i],
                'evento_id' => $eventoId->id,
                'valor_venda' => $valorIngresso[$i],
                'quantidade_ingressos' => $quantidadeIngressos[$i],
                'quantidade_disponivel' => $quantidadeIngressos[$i],
            ];

            IngressosEvento::create($dataIngresso);
        }

        return response()->json([
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
