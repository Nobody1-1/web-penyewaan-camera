<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\DashboardUserController;

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
});

// Route::get('/dashboard',[DashboardUserController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardUserController::class,'index'])->name('dashboard');
    Route::post('/dashboard/order/{id}',[DashboardUserController::class,'storeOrder'])->name('dashboard.store');
    Route::delete('/dashboard/order/{id}',[DashboardUserController::class,'deleteOrder'])->name('dashboard.order.delete');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','admin'])->group(function () {
    Route::get('admin/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
    Route::get('admin/pelanggan',[HomeController::class,'pelanggan'])->name('admin.pelanggan');
    Route::get('admin/datacamera',[HomeController::class,'camera'])->name('admin.datacamera');
    Route::get('admin/penyewaan',[HomeController::class,'penyewaan'])->name('admin.penyewaan');
    Route::get('admin/camera/{id}/edit',[CameraController::class,'edit'])->name('admin.editCamera');
    Route::get('admin/camera/create',[CameraController::class,'create'])->name('admin.createCamera');
    Route::post('admin/camera',[CameraController::class,'store'])->name('admin.storeCamera');
    Route::put('admin/camera/{id}',[CameraController::class,'update'])->name('admin.updateCamera');
    Route::delete('admin/camera/{id}',[CameraController::class,'destroy'])->name('admin.destroyCamera');
    Route::get('admin/camera/detail/{id}',[CameraController::class,'show'])->name('admin.detailCamera');
    Route::post('admin/penyewaan/{id}',[HomeController::class,'payment'])->name('admin.store.payment');
    Route::post('admin/penyewaan',[HomeController::class,'storePenyewaan'])->name('admin.store.penyewaan');
    Route::get('admin/penyewaan/export-orders-pdf', [HomeController::class, 'exportOrdersPdf'])->name('export.orders.pdf');

   
});

require __DIR__.'/auth.php';


