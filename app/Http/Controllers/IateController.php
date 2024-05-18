<?php

namespace App\Http\Controllers;

use App\Models\iate;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class IateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosIate = iate::All();
        $contador = $dadosIate->count();

        return 'Iates: '.$contador.$dadosIate.Response()->json([],Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosIate = $request->All();
        $validarDados = Validator::make($dadosIate,[
            'marca' => 'required',
            'modelo' => 'required',
            'cor' => 'required',
            'ano' => 'required',
            'id' => 'required',
        ]);

        if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->errors()->first();
        }

        $iatesCadastrar = iate::create($dadosIate);
        if($iatesCadastrar){
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
        $iate = iate::find($id);

        if($iate){
            return 'Iate localizado.'.$iate;
        }else{
            return 'Iate não localizado.'.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dadosIate = $request->All();
        $validarDados = Validator::make($dadosIate,[
            'marca' => 'required',
            'modelo' => 'required',
            'cor'=> 'required',
            'ano'=> 'required',
            'id' => 'required',
        ]);

        if($validarDados->fails()){
            return 'Dados Invalidos.'.$validarDados->error(true). 500;
        }

        $iate = iate::find($id);
        $iate->marca = $dadosIate['marca'];
        $iate->modelo = $dadosIate['modelo'];
        $iate->cor = $dadosIate['cor'];
        $iate->ano = $dadosIate['ano'];

        $retorno = $iate->save();

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
        $dadosIate = iate::find($id);

        if($dadosIate->delete()){
            return 'O veículo foi deletado com sucesso!!!';
        }

        return 'O veículo não foi deletado.'. response()->json([],Response::HTTP_NO_CONTENT);
    }
}
