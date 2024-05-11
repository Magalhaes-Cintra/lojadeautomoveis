<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\MotoController;
use App\Http\Controllers\CarroController;

route::get('/', function(){return response()->json(['Sucesso'=>true]);});
route::get('/motos',[MotoController::class,'index']);
route::get('/motos/{id}',[MotoController::class,'show']);
route::post('/motos',[MotoController::class,'store']);
route::delete('/motos/{id}',[MotoController::class, 'destroy']);
route::put('/motos/{id}',[MotoController::class, 'update']);

route::get('/', function(){return response()->json(['Sucesso'=>true]);});
route::get('/carros',[CarroController::class,'index']);
route::get('/carros/{id}',[CarroController::class,'show']);
route::post('/carros',[CarroController::class,'store']);
route::delete('/carros/{id}',[CarroController::class, 'destroy']);
route::put('/carros/{id}',[CarroController::class, 'update']);
