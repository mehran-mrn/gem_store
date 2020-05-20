<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMkKardgarWeblogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mk_kardgar_weblog_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->text('slug');
            $table->text('title');
            $table->text('subtitle');
            $table->text('meta_description');
            $table->longText('post_body');
            $table->boolean('is_published');
            $table->string('image_url');
            $table->string('lang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mk_kardgar_weblog_posts');
    }
}
