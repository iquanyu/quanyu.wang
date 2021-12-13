<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FuturePublishArticle implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * article 实例
   *
   * @var \App\Models\Article
   */
  protected $article;
  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(Article $article)
  {
    $this->article = $article;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    //
  }
}
