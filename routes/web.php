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

Route::get('/nna/create',[NnaController::class, 'create'])->name('nna.create');
Route::post('/nna', [NnaController::class, 'store'])->name('nna.store');

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


