<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ECommerceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserNurseController;
use App\Http\Controllers\UserPatientController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[ECommerceController::class,'menu'])->name('catalogo');

//vistas de administrador

Route::get('/administrator/login',[AdministratorController::class,'getLogin'])->name('administrator.get_login');
Route::post('/administrator/login',[AdministratorController::class,'login'])->name('administrator.login');
Route::post('/administrator/logout',[AdministratorController::class,'logout'])->name('administrator.logout');

Route::get('/administrator/menu',[AdministratorController::class,'menu'])->name('administrator.menu')->middleware('auth:administrator');

Route::get('/administrator/nurse/index',[NurseController::class,'index'])->name('administrator.nurse.index');
Route::get('/administrator/nurse/create',[NurseController::class,'create'])->name('administrator.nurse.create');
Route::post('/administrator/nurse/store',[NurseController::class,'store'])->name('administrator.nurse.store');
Route::get('/administrator/nurse/show/{User}',[NurseController::class,'show'])->name('administrator.nurse.show');
Route::get('/administrator/nurse/edit/{User}',[NurseController::class,'edit'])->name('administrator.nurse.edit');
Route::post('/administrator/nurse/update/{User}',[NurseController::class,'update'])->name('administrator.nurse.update');
Route::post('/administrator/nurse/destroy/{User}',[NurseController::class,'destroy'])->name('administrator.nurse.destroy');

Route::get('/administrator/patient/index',[PatientController::class,'index'])->name('administrator.patient.index');
Route::get('/administrator/patient/create',[PatientController::class,'create'])->name('administrator.patient.create');
Route::post('/administrator/patient/store',[PatientController::class,'store'])->name('administrator.patient.store');
Route::get('/administrator/patient/show/{User}',[PatientController::class,'show'])->name('administrator.patient.show');
Route::get('/administrator/patient/edit/{User}',[PatientController::class,'edit'])->name('administrator.patient.edit');
Route::post('/administrator/patient/update/{User}',[PatientController::class,'update'])->name('administrator.patient.update');
Route::post('/administrator/patient/destroy/{User}',[PatientController::class,'destroy'])->name('administrator.patient.destroy');

Route::get('/administrator/service/index',[ServiceController::class,'index'])->name('administrator.service.index');
Route::get('/administrator/service/create',[ServiceController::class,'create'])->name('administrator.service.create');
Route::post('/administrator/service/store',[ServiceController::class,'store'])->name('administrator.service.store');
Route::get('/administrator/service/show/{Service}',[ServiceController::class,'show'])->name('administrator.service.show');
Route::get('/administrator/service/edit/{Service}',[ServiceController::class,'edit'])->name('administrator.service.edit');
Route::post('/administrator/service/update/{Service}',[ServiceController::class,'update'])->name('administrator.service.update');
Route::post('/administrator/service/destroy/{Service}',[ServiceController::class,'destroy'])->name('administrator.service.destroy');

Route::get('/administrator/category/index',[CategoryController::class,'index'])->name('administrator.category.index');
Route::get('/administrator/category/create',[CategoryController::class,'create'])->name('administrator.category.create');
Route::post('/administrator/category/store',[CategoryController::class,'store'])->name('administrator.category.store');
Route::get('/administrator/category/show/{Category}',[CategoryController::class,'show'])->name('administrator.category.show');
Route::get('/administrator/category/edit/{Category}',[CategoryController::class,'edit'])->name('administrator.category.edit');
Route::post('/administrator/category/update/{Category}',[CategoryController::class,'update'])->name('administrator.category.update');
Route::post('/administrator/category/destroy/{Category}',[CategoryController::class,'destroy'])->name('administrator.category.destroy');


Route::get('/administrator/invoice/index',[InvoiceController::class,'index'])->name('administrator.invoice.index')->middleware('auth:administrator');
Route::get('/administrator/invoice/edit/{Invoice}',[InvoiceController::class,'edit'])->name('administrator.invoice.edit')->middleware('auth:administrator');
Route::post('/administrator/invoice/edit/{Invoice}',[InvoiceController::class,'update'])->name('administrator.invoice.update')->middleware('auth:administrator');

//vistas de enfermera

Route::get('/nurse/login',[UserNurseController::class,'getLogin'])->name('nurse.get_login');
Route::post('/nurse/login',[UserNurseController::class,'login'])->name('nurse.login');
Route::post('/nurse/logout',[UserNurseController::class,'logout'])->name('nurse.logout');

Route::get('/nurse/menu',[UserNurseController::class,'menu'])->name('nurse.menu')->middleware('auth:nurse');

Route::get('/nurse/offer/index',[OfferController::class,'index'])->name('nurse.offer.index')->middleware('auth:nurse');
Route::get('/nurse/offer/create',[OfferController::class,'create'])->name('nurse.offer.create')->middleware('auth:nurse');
Route::post('/nurse/offer/create/{id_service}',[OfferController::class,'store'])->name('nurse.offer.store')->middleware('auth:nurse');


Route::get('/nurse/invoice/pending',[InvoiceController::class,'rolDeVisitasPendiente'])->name('nurse.invoice.pending')->middleware('auth:nurse');
Route::post('/nurse/invoice/{Invoice}/check_in',[InvoiceController::class,'checkIn'])->name('nurse.invoice.check_in')->middleware('auth:nurse');
Route::post('/nurse/invoice//{Invoice}/check_out',[InvoiceController::class,'checkOut'])->name('nurse.invoice.check_out')->middleware('auth:nurse');
Route::get('/nurse/invoice/finished',[InvoiceController::class,'rolDeVisitasFinalizado'])->name('nurse.invoice.finished')->middleware('auth:nurse');


//vistas de paciente

Route::get('/login',[UserPatientController::class,'getLogin'])->name('patient.get_login');
Route::post('/login',[UserPatientController::class,'login'])->name('patient.login');
Route::post('/logout',[UserPatientController::class,'logout'])->name('patient.logout');

Route::get('/menu',[UserPatientController::class,'menu'])->name('patient.menu')->middleware('auth:patient');
Route::get('/solicitar_servicio/{id_service}',[UserPatientController::class,'solicitarServicio'])->name('patient.solicitar_servicio')->middleware('auth:patient');
Route::post('/solicitar_servicio',[InvoiceController::class,'store'])->name('patient.invoice.store')->middleware('auth:patient');
Route::get('/historical',[InvoiceController::class,'historical'])->name('patient.historical')->middleware('auth:patient');

