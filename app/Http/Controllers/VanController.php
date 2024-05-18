<?php

namespace App\Http\Controllers;

use App\Models\van;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;


class VanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosVans = van::All();
        $contador = $dadosVans->count();

        return 'Vans: '.$contador.$dadosVans.Response()->json([],Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosVans = $request->All();
        $validarDados = Validator::make($dadosVans,[
            'marca' => 'required',
            'modelo' => 'required',
            'cor' => 'required',
            'ano' => 'required',
            'id' => 'required',
        ]);

        if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->errors()->first();
        }

        $vansCadastrar = van::create($dadosVans);
        if($vansCadastrar){
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
        $van = van::find($id);

        if($van){
            return 'Van localizada.'.$van;
        }else{
            return 'Van não localizada.'.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dadosVans = $request->All();
        $validarDados = Validator::make($dadosVans,[
            'marca' => 'required',
            'modelo' => 'required',
            'cor'=> 'required',
            'ano'=> 'required',
            'id' => 'required',
        ]);

        if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->error(true). 500;
        }

        $van = van::find($id);
        $van->marca = $dadosVans['marca'];
        $van->modelo = $dadosVans['modelo'];
        $van->cor = $dadosVans['cor'];
        $van->ano = $dadosVans['ano'];

        $retorno = $van->save();

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
        $dadosVans = van::find($id);

        if($dadosVans->delete()){
            return 'O veículo foi deletado com sucesso!!!';
        }

        return 'O veículo não foi deletado.'. response()->json([],Response::HTTP_NO_CONTENT);
    }
}
