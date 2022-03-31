<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function() {
    return User::all();
});

Route::get('/user/{user}', function(User $user) {
    return ['user' => $user, 'car' => $user->cars];
});

Route::post('/user', function(Request $request) {

    $attributes = [
        'name' => $request->name,
        'email' => $request->email,
        'cpf' => $request->cpf,
        'contact' => $request->contact,
        'password' => bcrypt($request->password),
    ];

    User::create($attributes);

    return response()->json([
        'message' => 'User succesfully created'
    ], 200);
});
