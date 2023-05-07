<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeautyController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BeautyController::class, 'index']);
Route::get('/index', [BeautyController::class, 'index']);

Route::get('/search', [BeautyController::class, 'search']);
Route::get('/result/{category}', [BeautyController::class, 'result']);

Route::get('/register', [BeautyController::class, 'register']);
Route::post('/confirm', [BeautyController::class, 'confirm']);
Route::post('/complete', [BeautyController::class, 'complete']);

Route::get('/login', [BeautyController::class, 'login']);
Route::post('/user', [BeautyController::class, 'authenticate']);
Route::get('/user', [BeautyController::class, 'user']);

Route::get('/regicosme', [BeautyController::class, 'regicosme']);
Route::post('/cosmecomp', [BeautyController::class, 'cosmecomp']);

Route::get('/edit/{id}', [BeautyController::class, 'edit'])->name('edit_id');
Route::post('/editcomp', [BeautyController::class, 'editcomp'])->name('editcomp_id');
Route::get('/user/{id}', [BeautyController::class, 'delete'])->name('delete_id');
Route::get('/logout', [BeautyController::class, 'logout']);

Route::get('/cosme/{id}', [BeautyController::class, 'cosme'])->name('cosme_id');
Route::get('/cosme2/{id}', [BeautyController::class, 'cosme2'])->name('cosme2_id');

Route::get('/review/{id}', [BeautyController::class, 'review'])->name('review_id');
Route::post('/comp', [BeautyController::class, 'comp'])->name('comp_id');

Route::get('/editcosme/{id}', [BeautyController::class, 'editcosme'])->name('editcosme_id');
Route::post('/cosmecomp2', [BeautyController::class, 'cosmecomp2']);
Route::get('/deletecosme/{id}', [BeautyController::class, 'deletecosme'])->name('deletecosme_id');

Route::get('/delreview/{id}', [BeautyController::class, 'delreview'])->name('delreview_id');

Route::get('/pass', [BeautyController::class, 'pass']);
Route::post('/passcomp', [BeautyController::class, 'passcomp']);

Route::post('/like', [BeautyController::class, 'like']);
Route::post('/like2', [BeautyController::class, 'like2']);