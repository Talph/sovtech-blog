<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title')->nullable()->default('New Blog Post');
            $table->string('subtitle')->nullable();
            $table->text('meta_desc')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('short_description')->nullable();
            $table->mediumText('post_body')->nullable();
            $table->dateTime('posted_at')->index()->nullable()->comment('Posted time, if this is in future then blog will not appear yet');
            $table->boolean('is_published')->default(false);
            $table->string('slug')->unique();
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
        Schema::dropIfExists('posts');
    }
};
