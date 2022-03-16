<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ArticleManagementController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsManagementController;

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

Route::resource('news', NewsController::class)->names([
    'index' => 'news.index',
    'show' => 'news.show',
    'create' => 'news.create',
    'edit' => 'news.edit',
])->parameters([
    'news' => 'news',
]);

Route::get('/management', [ArticleManagementController::class, 'index'])->name('article.management');
Route::get('/admin/management', [ArticleManagementController::class, 'index'])->name('admin.management');
Route::get('/admin/management/news', [NewsManagementController::class, 'index'])->name('admin.management.news');

Route::get('/admin/feedback', [ContactsController::class, 'index'])->name('feedback');
Route::get('/contacts', [ContactsController::class, 'create'])->name('contacts');
Route::post('/admin/feedback', [ContactsController::class, 'store']);

Route::post('/comment/{article}', [CommentsController::class, 'store'])->name('comment');

Route::get('/about', function () {
    return view('about');
})->name('about');

Auth::routes();

