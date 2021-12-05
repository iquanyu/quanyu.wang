<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    //DB::table('users')->truncate();

    \App\Models\User::factory(10)->create();

    //DB::table('categories')->truncate();

    $category = [
      'name'        => '未分类',
      'description' => '项目初始化默认分类',
      'slug'        => 'unclassified',
      'count'       => 1
    ];

    Category::create($category);

    DB::table('articles')->truncate();

    \App\Models\Article::factory(10)->create();

    $user = User::find(1);

    $user->name = 'admin';
    $user->email = 'admin@admin.com';
    $user->save();
  }
}
