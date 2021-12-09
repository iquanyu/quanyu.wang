<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use DateTimeInterface;
use Illuminate\Support\Str;
use Overtrue\Pinyin\Pinyin;

class Article extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title', 'description', 'content', 'cover', 'slug', 'is_top', 'type', 'view_count', 'category_id', 'markdown', 'state', 'futured_at', 'deleted_at'
  ];

  protected $dates = [
    'futured_at',
    'deleted_at'
  ];
  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = [
    'cover_photo_url'
  ];


  /**
   * 执行预先授权检查
   *
   * @param  \App\Models\User  $user
   * @param  string  $ability
   * @return void|bool
   */
  public function before(User $user, $ability)
  {
    if ($user->id == 1) {
      return true;
    }
  }


  public function getCoverPhotoUrlAttribute()
  {
    return asset($this->cover);
  }



  public function setSlugAttribute()
  {
    $this->attributes['slug'] = Str::slug(app(Pinyin::class)->permalink($this->title));
  }

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

  public static function setSlug($title)
  {

    $slug = Str::slug(app(Pinyin::class)->permalink($title));

    if (!static::query()->where('slug', $slug)->exists()) {
      return $slug;
    } else {
      $no = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
      return $slug . '-' . $no;
    }
  }

  public function scopeFilter($query, array $filters)
  {
    $query->when($filters['search'] ?? null, function ($query, $search) {
      $query->where('title', 'like', '%' . $search . '%');
    })->when($filters['state']  ?? null, function ($query, $state) {
      if ($state == 'publish' || $state == 'draft' || $state == 'trash' || $state == 'future' || $state == 'private') {
        $query->where('state', $state);
      }
    });
  }

  public function scopePublish($query)
  {
    $query->where('state', 'publish');
  }
}
