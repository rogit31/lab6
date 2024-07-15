<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/index', [ArticleController::class, 'index']);

Route::post('/store',[ArticleController::class, 'store'] );

Route::put ('/update/{id}', [ArticleController::class, 'update'] );

Route::delete('/delete/{id}', [ArticleController::class, 'destroy']);
