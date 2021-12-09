<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\Category;

class ArticleObserver
{
  /**
   * Handle the Article "created" event.
   *
   * @param  \App\Models\Article  $article
   * @return void
   */
  public function created(Article $article)
  {
    $category = $article->category;

    $category->count = $category->articles()->count();

    $category->save();
  }

  /**
   * Handle the Article "updated" event.
   *
   * @param  \App\Models\Article  $article
   * @return void
   */
  public function updated(Article $article)
  {
    //
  }

  /**
   * Handle the Article "deleted" event.
   *
   * @param  \App\Models\Article  $article
   * @return void
   */
  public function deleted(Article $article)
  {
    $article->state = 'trash';
    $article->save();
  }

  /**
   * Handle the Article "restored" event.
   *
   * @param  \App\Models\Article  $article
   * @return void
   */
  public function restored(Article $article)
  {
    $article->state = 'publish';
    $article->save();
  }

  /**
   * Handle the Article "force deleted" event.
   *
   * @param  \App\Models\Article  $article
   * @return void
   */
  public function forceDeleted(Article $article)
  {
    return true;
  }
}
