<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'description', 'slug', 'count',
  ];

  public function articles()
  {
    return $this->hasMany(Article::class);
  }
}
