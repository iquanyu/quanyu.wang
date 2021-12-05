<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use DateTimeInterface;

class Article extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title', 'description', 'content', 'cover', 'slug', 'is_top', 'type', 'view_count', 'category_id', 'markdown'
  ];

  protected function serializeDate(DateTimeInterface $date)
  {
    return Carbon::instance($date)->toDateTimeString();
  }

  public function author()
  {
    return $this->beLongsTo(User::class, 'user_id');
  }

  public function category()
  {
    return $this->beLongsTo(Category::class);
  }

  /**
   * 获取此文章的所有评论
   */
  public function comments()
  {
    return $this->morphMany(Comment::class, 'commentable');
  }

  public function getCreatedAtAttribute($date)
  {
    if (Carbon::now() > Carbon::parse($date)->addDays(7)) {
      return Carbon::parse($date)->toDateString();
    }
    return Carbon::parse($date)->diffForHumans();
  }

  public function getLastArticleAttribute()
  {
    return Article::where('id', '<', $this->id)->latest('id')->first();
  }

  public function getNextArticleAttribute()
  {
    return Article::where('id', '>', $this->id)->oldest('id')->first();
  }
}
