<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [EmployeeController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard', [EmployeeController::class, 'updatePassword'])->name('update-password');

Route::get('/dashboard/pdf',[EmployeeController::class, 'pdf'])->name('listofusers.pdf');

require __DIR__.'/auth.php';

