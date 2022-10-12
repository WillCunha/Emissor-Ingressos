<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\VendasController;

Route::get('ingressos', [VendasController::class, 'index']);
Route::put('ingressos/{id}/{quantidade}', [VendasController::class, 'update']);
