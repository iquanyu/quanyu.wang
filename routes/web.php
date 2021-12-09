<?php

use App\Http\Controllers\ArticlesController;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Overtrue\Pinyin\Pinyin;
use Illuminate\Support\Str;

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

/*manage*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

  Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
  })->name('dashboard');

  Route::get('/articles/create', [ArticlesController::class, 'create'])->name('articles.create');
  Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
  Route::post('/articles/{article}/restore', [ArticlesController::class, 'restore'])->name('articles.restore');
  Route::delete('/articles/{article}/force_delete', [ArticlesController::class, 'forceDelete'])->name('articles.force_delete');
  Route::post('/articles/store', [ArticlesController::class, 'store'])->name('articles.store');
  Route::post('/articles/{article}', [ArticlesController::class, 'update'])->name('articles.update');
  Route::delete('/articles/{article}', [ArticlesController::class, 'destroy'])->name('articles.destory');


  Route::get('/manage/articles', function () {

    $filters = Request::all('search', 'state');
    if (is_null($filters['state'])) {
      $filters['state'] = 'all';
    }

    return Inertia::render('Manage/Articles', [
      'filters' => $filters,
      'articles' => Auth::user()->articles()->withTrashed()->latest()->filter(Request::only(['search', 'state']))->paginate(5)->withQueryString()
    ]);
  })->name('manage.articles');
});


/*前台*/

Route::get('/', function () {
  return Inertia::render('Welcome', [
    'articles' => Article::publish()->orderBy('is_top', 'desc')->latest()->simplePaginate(),
  ]);
})->name('home');

/*文章相关*/
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');


/*归档页面*/
Route::get('/archives', function () {
  $articles = Article::oldest()
    ->selectRaw('DATE_FORMAT(created_at,"%Y") as y, DATE_FORMAT(created_at,"%Y-%m") as date, id,title')
    //->orderBy('y')
    ->orderBy('date', 'DESC')
    ->get()
    ->groupBy('y');
  return Inertia::render('Archives', [
    'articles' => $articles,
  ]);
})->name('archives');

/*关于博主页面*/
Route::get('/about', function () {
  return Inertia::render('About', []);
})->name('about');


Route::post('update/image/{type?}', function (Request $request, $type) {

  $type = 'cover';

  if ($request->file('cover')) {
    $path = $request->file('cover')->store('cover');

    return Str::of($path)->replace('public', 'storage');
  } else {
    dd(2);
  }
});


Route::get('/test', function () {
  return Inertia::render('Article/Test');
});
