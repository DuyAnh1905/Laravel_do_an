<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupportController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function(){
    $categories = Category::with('posts')->get();
    return view('index', compact('categories'));
})->name('home');
Auth::routes();
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc'])->name('danhmuc');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/about', [aboutController::class, 'index'])->name('about');

Route::get('/user', [HomeController::class, 'user'])->name('user');
Route::get('/product', [HomeController::class, 'product'])->name('products');
Route::get('/image', [HomeController::class, 'image'])->name('image');

Route::resource('/categories',CategoryController::class);
Route::resource('/product',ProductController::class);
Route::resource('/image',ImageController::class);
Route::resource('/chapter',ChapterController::class);

Route::get('/support', [SupportController::class, 'index'])->name('support');
Route::post('/support', [SupportController::class, 'sendSupportRequest'])->name('support.send');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/{id}', 'CategoryController@show')->name('category.show');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/chapters', [ChapterController::class, 'index'])->name('chapter.index');
Route::get('/chapters/{id}/edit', [ChapterController::class, 'edit'])->name('chapter.edit');
Route::delete('/chapters/{id}', [ChapterController::class, 'destroy'])->name('chapter.destroy');
Route::get('/search', [IndexController::class, 'search'])->name('search');