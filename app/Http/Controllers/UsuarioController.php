<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('login')){
            return redirect ('/inicio');
        }else{
            return view('login.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function auth(Request $request)
    {

        if (Auth::attempt(['cpf' => $request->fieldCPF, 'password' => $request->fieldSenha])) {
            session()->put('login', $request->fieldCPF);
            return response()->json([
                'status' => 200
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'dados' => $request->fieldCPF .' '. $request->fieldSenha
            ]);
        }
    }

    public function create()
    {
        if(session()->has('login')){
            return view('login.cadastro');
        }else{
            return redirect()->route('login.page');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dados = [
            'name' => $request->fieldNome,
            'email' => $request->fieldEmail,
            'cpf' =>  $request->fieldCPF,
            'password' => Hash::make($request->fieldSenha),
        ];

        if (!filter_var($request->fieldEmail, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                //EMAIL INVÁLIDO
                    'status' => 403
            ]);
        }
        if ($request->fieldSenha == $request->fieldRepitaSenha) {
            User::create($dados);
            return response()->json([
                //SUCESSO
                'status' => 200,
            ]);
        } else {
            return response()->json([
                //SENHA NÃO BATEM
                'status' => 404
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }

    public function logout()
    {
        session()->forget('login');
        return redirect()->route('login.page');
    }
}
