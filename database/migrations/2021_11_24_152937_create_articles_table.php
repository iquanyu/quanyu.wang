<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('articles', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained();
      $table->foreignId('category_id')->constrained()->onDelete('cascade');
      $table->string('title')->nullable();
      $table->string('description', 500)->nullable();
      $table->mediumText('markdown');
      $table->mediumText('content');
      $table->string('cover')->nullable();
      $table->string('slug')->nullable();
      $table->unsignedTinyInteger('is_top')->default(0);
      $table->string('type')->default('article');
      $table->integer('view_count')->default(0);
      $table->string('state')->deflault('draft');
      //draft草稿，trash回收站，publish已发布，future定时，private私有
      $table->dateTime('futured_at')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('articles');
  }
}
