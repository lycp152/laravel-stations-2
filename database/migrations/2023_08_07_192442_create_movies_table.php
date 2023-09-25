<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->text('title')->comment('映画タイトル');
            $table->text('image_url')->comment('画像URL');
            $table->integer('published_year')->comment('公開年');
            $table->tinyInteger('is_showing')->comment('上映中かどうか')->default(false);
            $table->text('description')->comment('概要');
            $table->timestamp('created_at')->comment('登録日時')->default(now());
            $table->timestamp('updated_at')->comment('更新日時')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
