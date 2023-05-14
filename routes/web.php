<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\CommentController;

//main home//

Route::get('/', [ArticleController::class, 'dashboard'])->name('dashboard');

Route::get('update/{article}', [
    ArticleController::class,
    'updatearticle'
])->name('articles.find');

Route::post(
    '/articleupdate/{articleID}',
    [ArticleController::class, 'updatedArticle']
)->name('article.update');


Route::post(
    '/articles/{id}',
    [ArticleController::class, 'delete']
)->name('articles.destroy');


Route::get(
    'articles/{article}',
    [ArticleController::class, 'articleRead']
)->name('article.read');

Route::get('/createpage', [ArticleController::class, 'loadCreatepage'])->name('loadCreatepage');
Route::get('/UserRoleMenu', [UserRoleController::class, 'LoadUserCreatepage'])->name('userRole.dashboard');



Route::post('/artices/create', [ArticleController::class, 'createArticle'])->name('article.create');



Route::post('/articles/{article}/comments', [CommentController::class, 'postComment'])->name('comment.post');
Route::delete('/comments/{comment}', [CommentController::class, 'delete'])->name('comment.delete');
Route::put('/comment/{comment}/update', [CommentController::class, 'updateComment'])->name('comment.update');