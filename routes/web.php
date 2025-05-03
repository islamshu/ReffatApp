<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/send', function () {
    return view('send');
});
Route::post('createLink', [HomeController::class, 'create_link'])->name('create_link');
Route::get('inv/{code}', [HomeController::class, 'show_invoice'])->name('show_invoice');
Route::post('pay', [HomeController::class, 'pay'])->name('pay');
Route::post('confirm', [HomeController::class, 'confirm'])->name('confirm');
Route::get('success_url/{code}', [HomeController::class, 'success_url'])->name('success_url');
Route::get('failure_url/{code}', [HomeController::class, 'error_url'])->name('error_url');
Route::get('/check-order-status', [HomeController::class, 'checkOrderStatus'])->name('check_order_status');
Route::get('success', [HomeController::class, 'success'])->name('success');
Route::get('error', [HomeController::class, 'error'])->name('error');
Route::get('pdf/{code}', [HomeController::class, 'pdf'])->name('pdf');
Route::post('check_verification_code', [HomeController::class, 'check_virification_code'])->name('check.verification.code'); //

Route::post('send_message',[HomeController::class, 'send_message'])->name('send_message');


