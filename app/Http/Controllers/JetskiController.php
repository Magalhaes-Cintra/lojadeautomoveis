<?php

namespace App\Http\Controllers;

use App\Models\jetski;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class JetskiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosJetskis = jetski::All();
        $contador = $dadosJetskis->count();

        return 'Jetski: '.$contador.$dadosJetskis.Response()->json([],Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosJetskis = $request->All();
        $validarDados = Validator::make($dadosJetskis,[
            'marca' => 'required',
            'modelo' => 'required',
            'cor' => 'required',
            'ano' => 'required',
        ]);

        if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->error(true). 500;
        }

        $jetskisCadastrar = jetski::create($dadosJetskis);
        if($jetskisCadastrar){
            return 'Dados cadastrados com sucesso.'.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'Dados não cadastrados.'.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jetski = jetski::find($id);

        if($jetski){
            return 'Jetski localizado.'.$jetski;
        }else{
            return 'Jetski não localizado.'.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dadosJetskis = $request->All();
        $validarDados = Validator::make($dadosJetskis,[
            'marca' => 'required',
            'modelo' => 'required',
            'cor'=> 'required',
            'ano'=> 'required',
        ]);

        if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->error(true). 500;
        }

        $jetski = jetski::find($id);
        $jetski->marca = $dadosJetskis['marca'];
        $jetski->modelo = $dadosJetskis['modelo'];
        $jetski->cor = $dadosJetskis['cor'];
        $jetski->ano = $dadosJetskis['ano'];

        $retorno = $jetski->save();

        if($retorno){
            return 'Dados atualizados com sucesso.'.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'Dados não atualizados.'.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dadosJetskis = jetski::find($id);

        if($dadosJetskis->delete()){
            return 'O veículo foi deletado com sucesso!!!';
        }

        return 'O veículo não foi deletado.'. response()->json([],Response::HTTP_NO_CONTENT);
    }
}
