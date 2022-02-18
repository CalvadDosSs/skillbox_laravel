<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\TagsController;

Route::get('/articles/tags/{tag}', [TagsController::class, 'index'])->name('tags.main');

Route::resource('/', ArticlesController::class)->only([
    'index', 'store',
])->names([
    'index' => 'main',
]);

Route::resource('articles', ArticlesController::class)->names([
    'show' => 'articles.show',
    'create' => 'articles.create',
    'edit' => 'articles.edit',
])->parameters([
    'articles' => 'article',
]);

Route::get('/admin/feedback', [ContactsController::class, 'index'])->name('feedback');
Route::get('/contacts', [ContactsController::class, 'create'])->name('contacts');
Route::post('/admin/feedback', [ContactsController::class, 'store']);

Route::get('/about', function () {
    return view('about');
})->name('about');

Auth::routes();
