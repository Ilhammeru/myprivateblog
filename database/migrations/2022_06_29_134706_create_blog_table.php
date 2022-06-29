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
        Schema::create('blog', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->longText('content');
            $table->integer('author');
            $table->boolean('status')->default(TRUE);
            $table->integer('category_id');
            $table->integer('detail_category_id')->nullable();
            $table->boolean('is_post')->default(FALSE);
            $table->boolean('is_main_blog')->default(FALSE)->comment('blog who will be shown with the larger image');
            $table->boolean('is_thumbnail_blog')->default(FALSE)->comment('blog who will be shown with the smaller image');
            $table->boolean('is_content_blog')->default(FALSE)->comment('blog who will be shown with the starndart image size');
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
        Schema::dropIfExists('blog');
    }
};
