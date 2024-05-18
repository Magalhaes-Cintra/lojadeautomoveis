<?php

namespace App\Http\Controllers;

use App\Models\carro;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosCarros = carro::All();
        $contador = $dadosCarros->count();

        return 'Carros: '.$contador.$dadosCarros.Response()->json([],Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosCarros = $request->All();
        $validarDados = Validator::make($dadosCarros,[
            'marca' => 'required',
            'modelo' => 'required',
            'cor' => 'required',
            'ano' => 'required',
            'id' => 'required',
        ]);

        if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->errors()->first();
        }

        $carrosCadastrar = carro::create($dadosCarros);
        if($carrosCadastrar){
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
        $carro = carro::find($id);

        if($carro){
            return 'Carro localizado.'.$carro;
        }else{
            return 'Carro não localizado.'.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dadosCarros = $request->All();
        $validarDados = Validator::make($dadosCarros,[
            'marca' => 'required',
            'modelo' => 'required',
            'cor'=> 'required',
            'ano'=> 'required',
            'id' => 'required',
        ]);

        if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->error(true). 500;
        }

        $carro = carro::find($id);
        $carro->marca = $dadosCarros['marca'];
        $carro->modelo = $dadosCarros['modelo'];
        $carro->cor = $dadosCarros['cor'];
        $carro->ano = $dadosCarros['ano'];

        $retorno = $carro->save();

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
        $dadosCarros = carro::find($id);

        if($dadosCarros->delete()){
            return 'O veículo foi deletado com sucesso!!!';
        }

        return 'O veículo não foi deletado.'. response()->json([],Response::HTTP_NO_CONTENT);
    }
}


