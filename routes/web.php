<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\CategoriaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', inicioController::class);


  

    

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
 Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    Route::controller(productoController::class)->group(function(){

        route::get('producto', 'principal')->name('producto.principal');
    
        route::get('producto/crear', 'crear')->name('producto.crear');
    
        route::post('producto','store')->name('producto.store');
    
        Route::get('producto/{variable}/mostrar', 'mostrar')->name('producto.mostrar');
    
        Route::get('producto/{producto}/edit', 'editar')->name('producto.editar');
    
        route::put('producto/{producto}','update')->name('producto.update');
    
        route::Delete('producto/{id}','borrar')->name('producto.borrar');
    
        route::get('desactiva/{id}','desactivaproducto')->name('desactivaprod');
        route::get('activa/{id}','activaproducto')->name('activaprod');
    });
    });


 

    Route::controller(CategoriaController::class)->group(function () {
        Route::get('categoria', 'principal')->name('categoria.principal');
        Route::get('categoria/crear', 'crear')->name('categoria.crear');
        Route::get('categoria/{id}', 'mostrar')->name('categoria.mostrar');
        Route::post('categoria', 'store')->name('categoria.store');
        Route::get('categoria/{id}/editar', 'editar')->name('categoria.editar');
        Route::put('categoria/{id}', 'update')->name('categoria.update');
        Route::delete('categoria/{id}', 'borrar')->name('categoria.borrar');
        Route::get('categoria/{id}/activar', 'activar')->name('categoria.activar');
        Route::get('categoria/{id}/desactivar', 'desactivar')->name('categoria.desactivar');
    });
    