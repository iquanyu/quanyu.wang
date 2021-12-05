<?php

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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
  return Inertia::render('Welcome', [
    'articles' => Article::orderBy('is_top', 'desc')->latest()->simplePaginate(),
  ]);
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/articles/create', function () {
  return Inertia::render('Article/Create');
})->name('articles.create');

Route::get('/articles/{article}', function (Article $article) {
  $article->load(['author', 'category']);
  $article->setAppends(['last_article', 'next_article']);

  $article->view_count++;
  $article->save();
  return Inertia::render('Article/Show', [
    'article' => $article,
  ]);
})->name('articles.show');

Route::post('/articles/store', function (Request $request) {
  Request::validate([
    'title' => ['required', 'max:50'],
    'content' => ['required'],
  ]);

  //return response()->json(Request::get('content'));

  Auth::user()->articles()->create([
    'title' => Request::get('title'),
    'content' => Request::get('content'),
    'markdown' => Request::get('markdown'),
    'is_top' => Request::get('is_top'),
    'category_id' => Request::get('category'),
  ]);

  return Redirect::route('home')->with('success', 'User created.');
})->name('articles.store');



Route::get('/archives', function () {
  $articles = Article::oldest()
    ->selectRaw('DATE_FORMAT(created_at,"%Y") as y, DATE_FORMAT(created_at,"%Y-%m") as date, id,title')
    ->orderBy('y')
    ->get()
    ->groupBy('y');
  return Inertia::render('Archives', [
    'articles' => $articles,
  ]);
})->name('archives');

Route::get('/about', function () {
  return Inertia::render('About', []);
})->name('about');
