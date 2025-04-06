<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Registro;
use App\Livewire\Login;
use App\Livewire\Logout;
use App\Livewire\Dashboard;


//EGVG 05/04/25: Grupo de rutas que no permiten ir a las vistas si no se ha iniciado sesión.
Route::group(['middleware'=>'auth'], function(){
    Route::view('/dashboard', "livewire/dashboard")->name('dashboard');
    Route::get('/logout', [Logout::class, 'logout'])->name('logout');

});

//EGVG 05/04/25: Grupo de rutas que no permiten ir a las vistas si se ha iniciado sesión.
Route::group(['middleware'=>'guest'], function(){
    Route::view('/registro', "livewire/registro")->name('register');
    Route::view('/login', "livewire/login")->name('login');
});

Route::post('/registro1', [Registro::class, 'register'])->name('registro1');//EGVG 05/04/25: Ruta que usa el post para recibir los valores que el usuario ingresa para su registro.
Route::post('/inicia-sesion', [Login::class, 'login'])->name('inicia-sesion');//EGVG 05/04/25: Ruta que usa el post para recibir los valores para iniciar sesion.
