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
      $table->timestamps();
      $table->softDeletes('deleted_at', 0);
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
