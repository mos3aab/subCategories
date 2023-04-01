<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('/select', [CategoryController::class, 'loadSelect']);
Route::get('/test/getChild/{id}', [CategoryController::class, 'SelectChild']);

Route::get('/category/list', [CategoryController::class, 'listCategories']);
Route::get('/category/add', [CategoryController::class, 'addCategory']);
Route::get('/category/edit/{id}', [CategoryController::class, 'editCategory']);
Route::post('/category/save/{id}', [CategoryController::class, 'saveCategory']);
Route::post('/category/delete/{id}', [CategoryController::class, 'deleteCategory']);
