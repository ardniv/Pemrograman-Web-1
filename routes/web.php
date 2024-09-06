<?php
 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
 
Route::get('/', function () {
    return view('user.dashboard');
})->name('user.dashboard');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
    Route::get('/list', [ProductController::class, 'index_user'])->name('user.list');
    Route::get('/dashboard/create', [ProductController::class, 'create'])->name('admin/products/create');
    Route::post('/dashboard/save', [ProductController::class, 'save'])->name('admin/products/save');
    Route::get('/dashboard/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
    Route::put('/dashboard/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
Route::middleware(['auth', 'admin'])->group(function () {
 
    Route::get('/admins', [HomeController::class, 'index'])->name('admins.dashboard');
    
    //Table
    Route::get('/admins/table', [TableController::class, 'index'])->name('admins.table.index');
    Route::get('/admins/table/create', [TableController::class, 'create'])->name('admins.table.create');
    Route::post('/admins/table', [TableController::class, 'store'])->name('admins.table.store');
    Route::get('/admins/table/update/{id}', [TableController::class, 'edit'])->name('admins.table.edit');
    Route::put('/admins/table/{id}', [TableController::class, 'update'])->name('admins.table.update');
    Route::delete('/admins/table/delete/{id}', [TableController::class, 'destroy'])->name('admins.table.destroy');
 
    //User
    Route::get('admins/users', [UserController::class, 'index'])->name('admins.user.index');
    Route::get('admins/users/create', [UserController::class, 'create'])->name('admins.user.create');
    Route::post('admins/users', [UserController::class, 'store'])->name('admins.user.store');
    Route::get('admins/users/update/{id}', [UserController::class, 'edit'])->name('admins.user.edit');
    Route::put('admins/users/{id}', [UserController::class, 'update'])->name('admins.user.update');
    Route::delete('admins/users/delete/{id}', [UserController::class, 'destroy'])->name('admins.user.destroy');
    
    //Route::get('/admin/products', [ProductController::class, 'index'])->name('admin/products');
    //Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    //Route::post('/admin/products/save', [ProductController::class, 'save'])->name('admin/products/save');
    //Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
    //Route::put('/admin/products/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
    //Route::get('/admin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin/products/delete');
});
 
require __DIR__.'/auth.php';
 
//Route::get('admin/dashboard', [HomeController::class, 'index']);
//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);