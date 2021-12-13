<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Overtrue\Pinyin\Pinyin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // Category::create([
    //   'name' => 'Laravel',
    //   'slug' => 'laravel',
    //   'description' => 'laravel'
    // ]);
    $articles = Article::withTrashed()->get();
    dd($articles);
    dd('index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::select(['id', 'name'])->get();
    return Inertia::render('Article/Create', [
      'categories' => $categories,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, Article $article)
  {
    $this->authorize('store', $article);

    $validated = $request->validate([
      'title' => 'required|max:255',
      'content' => 'required',
      'description' => 'max:500',
      'cover' => 'sometimes|image|nullable'
    ]);

    //return response()->json($request->all());

    $article = [
      'title' => $request->input('title'),
      'content' => $request->input('content'),
      'markdown' => $request->input('markdown'),
      'is_top' => $request->input('is_top'),
      'category_id' => $request->input('category'),
      'description' => $request->input('description'),
      'slug' => Str::slug(app(Pinyin::class)->permalink($request->input('title'))),
      'state' => in_array($request->input('article_state'), ['publish', 'draft', 'future', 'private']) ? $request->input('article_state') : 'publish',
      'futured_at' => $request->input('futured_at')
    ];

    //draft草稿，trash回收站，publish已发布，future定时，private私有
    if ($request->hasFile('cover')) {
      $path = $request->file('cover')->store('/public/cover');
      $article['cover'] = '/' . Str::of($path)->replace('public', 'storage');
    }


    Auth::user()->articles()->create($article);

    return Redirect::route('home')->with('success', 'Article created.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function show(Article $article)
  {
    $article->load(['author', 'category']);
    $article->setAppends(['last_article', 'next_article', 'cover_photo_url']);

    $article->view_count++;
    $article->save();

    return Inertia::render('Article/Show', [
      'article' => $article,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function edit(Article $article)
  {
    $article->load(['author', 'category']);
    $article->setAppends(['last_article', 'next_article']);

    $categories = Category::select(['id', 'name'])->get();

    return Inertia::render('Article/Edit', [
      'article' => $article,
      'categories' => $categories
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Article $article)
  {
    $validated = $request->validate([
      'title' => 'required|max:255',
      'content' => 'required',
      'description' => 'max:500',
      'cover' => 'sometimes|image'
    ]);

    $data = [
      'title' => $request->input('title'),
      'content' => $request->input('content'),
      'markdown' => $request->input('markdown'),
      'is_top' => $request->input('is_top'),
      'category_id' => $request->input('category'),
      'description' => $request->input('description'),
      //'slug' => Str::slug(app(Pinyin::class)->permalink($request->input('title')))
      'state' => in_array($request->input('article_state'), ['publish', 'draft', 'future', 'private']) ? $request->input('article_state') : $article->state,
      'futured_at' => $request->input('futured_at')
    ];

    if ($request->hasFile('cover')) {
      $path = $request->file('cover')->store('/public/cover');
      $data['cover'] = '/' . Str::of($path)->replace('public', 'storage');
    }


    $article->update($data);

    return Redirect::route('articles.show', $article->id)->with('success', 'Article updated.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function destroy(Article $article)
  {

    $this->authorize('delete', $article);

    $article->delete();

    return back();

    return Redirect::route('manage.articles')->with('success', 'Article updated.');
  }

  public function restore($id)
  {
    $article = Article::withTrashed()->findOrFail($id);

    $this->authorize('restore', $article);

    $article->restore();

    return back();

    return Redirect::route('manage.articles')->with('success', 'Article restore.');
  }

  public function forceDelete($id)
  {
    $article = Article::withTrashed()->findOrFail($id);

    $this->authorize('forceDelete', $article);


    DB::delete("delete from articles where id = " . $id);

    //$article->forceDelete();

    return back();

    return Redirect::route('manage.articles')->with('success', 'Article forceDelete.');
  }
}
