<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TeacherController;
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
    return view('welcome');
});
Route::get('/about-lara-app-electronics-devices', [AboutController::class, 'about'])->name('about');
Route::get('/contact-lara-app-contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/services-lara-app-services', [ServiceController::class, 'service'])->name('services');
Route::get('/contact', function () {
    return view('Contact');
});
Route::get('/services', function () {
    return view('Services');
});

//Category
Route::get('/category/all', [\App\Http\Controllers\CategoryController::class, 'allCat'])->name('all.category');
Route::post('/category/add', [\App\Http\Controllers\CategoryController::class, 'addCat'])->name('store.category');
Route::get('/category/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'editCat']);
Route::post('/category/update/{id}', [\App\Http\Controllers\CategoryController::class, 'updateCat']);
Route::get('/softdelete/category/{id}', [\App\Http\Controllers\CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [\App\Http\Controllers\CategoryController::class, 'restore']);
Route::get('/pdelete/category/{id}', [\App\Http\Controllers\CategoryController::class, 'parDelete']);

//Supplier
Route::get('/supplier/all', [\App\Http\Controllers\SupplierController::class, 'allSupplier'])->name('all.suppliers');
Route::post('/supplier/add', [SupplierController::class, 'StoreSupplier'])->name('store.supplier');
Route::get('/supplier/edit/{id}', [SupplierController::class, 'EditSupp']);
Route::post('/supplier/update/{id}', [SupplierController::class, 'UpdateSupp']);
Route::get('/supplier/delete/{id}', [SupplierController::class, 'DeleteSupp']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');

