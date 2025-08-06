<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddViewsLikesPublishedToArticlesTable extends Migration
{
  public function up()
{
    Schema::table('articles', function (Blueprint $table) {
        if (!Schema::hasColumn('articles', 'views')) {
            $table->unsignedBigInteger('views')->default(0);
        }
        if (!Schema::hasColumn('articles', 'likes')) {
            $table->unsignedBigInteger('likes')->default(0);
        }
        if (!Schema::hasColumn('articles', 'published')) {
            $table->boolean('published')->default(false);
        }
    });
}
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['views', 'likes', 'published']);
        });
    }

}
