<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\PracticanteController;
use App\http\Controllers\AsistenciaController;
use App\Models\Token;
use App\Models\Practicante;
use App\Models\Asistencia;
use App\Models\Oficina;
use App\Models\Area;
use App\Models\User;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('asistencia.index1');
})->middleware('auth')->name('home');
Route::get('/logout', function (Illuminate\Http\Request $request) {
    $request->session()->invalidate();
    return redirect('/');
})->name('logout');
Route::resource('areas',AreaController::class)->middleware('auth');
Route::resource('oficinas', OficinaController::class)->middleware('auth');
Route::resource('practicantes', practicanteController::class)->middleware('auth');
Route::get('/asistencias', [AsistenciaController::class, 'index1'])->name('asistencias.index1')->middleware('auth');
Route::get('/asistencias/buscar', [AsistenciaController::class, 'buscar'])->name('asistencias.buscar');
Route::get('/asistencias/buscardni', [AsistenciaController::class, 'buscardni'])->name('asistencias.buscardni');
Route::post('/marcarentrada', [AsistenciaController::class, 'marcarentrada'])->name('asistencias.marcarentrada');
Route::post('/marcarsalida', [AsistenciaController::class, 'marcarsalida'])->name('asistencias.marcarsalida');
Route::get('asistencia/reporte',[AsistenciaController::class, 'generarreporte'])->name('asistencias.generarreporte')->middleware('auth');
//Route::get('asistencia/generartoken',[AsistenciaController::class, 'generartoken'])->name('asistencias.generartoken')->middleware('auth');
Route::get('/inicio', function () {
     $practicantes=Practicante::where('fecha_fin',NULL)->count();
     $asistencias=Asistencia::whereDate('Created_at',date('Y-m-d'))->count();
     $oficina=Oficina::count();
     $area=Area::count();

    return view('inicio',compact('practicantes','asistencias','oficina','area'));
})->name('inicio')->middleware('auth');

Route::get('/users', function () {

   return view('users',['users'=> User::paginate()]);
})->name('users')->middleware('auth');

