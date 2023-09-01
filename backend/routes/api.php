<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', function () {
    return User::all();
});

Route::post('/user', function (Request $request) {
    $request->validate([
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
    ], [
        'firstName.required' => 'O primeiro nome é obrigatório',
        'lastName.required' => 'O sobrenome é obrigatório',
        'email.required' => 'O email é obrigatório',
        'email.email' => 'O email deve ser válido',
        'email.unique' => 'O email já está em uso',
        'password.required' => 'A senha é obrigatória',
        'password.min' => 'A senha deve ter no mínimo 8 caracteres',
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
