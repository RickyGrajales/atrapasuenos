<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NnaController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\TalentoHumanoController;
use App\Http\Controllers\InstitucionAliadaController;
use App\Http\Controllers\EncuentroController;
use App\Http\Controllers\ParticipacionEncuentroController;
use App\Http\Controllers\ValoracionPsicosocialController;
use App\Http\Controllers\RutaActivadaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\ResponsabilidadIcbfController;
use App\Http\Controllers\EvidenciaIcbfController;
use App\Http\Controllers\SeguimientoPsicosocialController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\DerechoVulneradoController;
use App\Http\Controllers\MedidaProteccionController;
use App\Http\Controllers\AcudienteController;

//rutas nna
Route::get('/nna', [NnaController::class, 'index'])->name('nna.index');
Route::get('/nna/create',[NnaController::class, 'create'])->name('nna.create');
Route::post('/nna', [NnaController::class, 'store'])->name('nna.store');
Route::get('/nna/{id}/edit', [NnaController::class, 'edit'])->name('nna.edit');
Route::put('/nna/{id}', [NnaController::class, 'update'])->name('nna.update');
Route::delete('/nna/{id}', [NnaController::class, 'destroy'])->name('nna.destroy');

//rutas de acudientes
Route::resource('acudiente', AcudienteController::class);
Route::get('/acudiente/create', [AcudienteController::class, 'create'])->name('acudiente.create');
Route::post('/acudiente', [AcudienteController::class, 'store'])->name('acudiente.store');
Route::get('/acudiente/{id}/edit', [AcudienteController::class, 'edit'])->name('acudiente.edit');
Route::put('/acudiente/{id}', [AcudienteController::class, 'update'])->name('acudiente.update');

//Rutas Familia
Route::resource('familia', FamiliaController::class);



Route::resource('talento-humano', TalentoHumanoController::class);
Route::resource('instituciones', InstitucionAliadaController::class);
Route::resource('encuentros', EncuentroController::class);
Route::resource('participaciones', ParticipacionEncuentroController::class);
Route::resource('valoraciones', ValoracionPsicosocialController::class);
Route::resource('rutas', RutaActivadaController::class);
Route::resource('documentos', DocumentoController::class);
Route::resource('indicadores', IndicadorController::class);
Route::resource('responsabilidades', ResponsabilidadIcbfController::class);
Route::resource('evidencias', EvidenciaIcbfController::class);
Route::resource('seguimiento-psicosocial', SeguimientoPsicosocialController::class);
Route::resource('historia-clinica', HistoriaClinicaController::class);
Route::resource('derecho-vulnerado', DerechoVulneradoController::class);
Route::resource('medida-proteccion', MedidaProteccionController::class);
Route::resource('acudientes', AcudienteController::class);

