<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\MotoController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\JetskiController;
use App\Http\Controllers\VanController;
use App\Http\Controllers\IateController;

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

route::get('/', function(){return response()->json(['Sucesso'=>true]);});
route::get('/jetskis',[JetskiController::class,'index']);
route::get('/jetskis/{id}',[JetskiController::class,'show']);
route::post('/jetskis',[JetskiController::class,'store']);
route::delete('/jetskis/{id}',[JetskiController::class, 'destroy']);
route::put('/jetskis/{id}',[JetskiController::class, 'update']);

route::get('/', function(){return response()->json(['Sucesso'=>true]);});
route::get('/vans',[VanController::class,'index']);
route::get('/vans/{id}',[VanController::class,'show']);
route::post('/vans',[VanController::class,'store']);
route::delete('/vans/{id}',[VanController::class, 'destroy']);
route::put('/vans/{id}',[VanController::class, 'update']);

route::get('/', function(){return response()->json(['Sucesso'=>true]);});
route::get('/iate',[IateController::class,'index']);
route::get('/iate/{id}',[IateController::class,'show']);
route::post('/iate',[IateController::class,'store']);
route::delete('/iate/{id}',[IateController::class, 'destroy']);
route::put('/iate/{id}',[IateController::class, 'update']);