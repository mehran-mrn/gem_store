<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMkKardgarWeblogPostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mk_kardgar_weblog_post_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->integer('user_id');
            $table->string('ip');
            $table->string('author_name');
            $table->text('comment');
            $table->boolean('approved')->defualt(0);
            $table->string('author_email');
            $table->string('author_website');
            $table->string('author_mobile');
            $table->integer('parent_id');
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
        Schema::dropIfExists('mk_kardgar_weblog_post_comments');
    }
}
