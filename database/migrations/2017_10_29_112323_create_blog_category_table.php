<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('blog_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('position', false, true);
            $table->integer('real_depth', false, true);


            $table->string('name', 255)->nullable();
            $table->string('slug')->index()->nullable();


            $table->softDeletes();

            $table->foreign('parent_id')
                ->references('id')
                ->on('blog_category')
                ->onDelete('set null');
        });

        Schema::create('blog_category_closure', function (Blueprint $table) {
            $table->increments('closure_id');

            $table->integer('ancestor', false, true);
            $table->integer('descendant', false, true);
            $table->integer('depth', false, true);

            $table->foreign('ancestor')
                ->references('id')
                ->on('blog_category')
                ->onDelete('cascade');

            $table->foreign('descendant')
                ->references('id')
                ->on('blog_category')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('blog_category_closure', function (Blueprint $table) {
            Schema::dropIfExists('blog_category_closure');
        });

        Schema::table('blog_category', function (Blueprint $table) {
            Schema::dropIfExists('blog_category');
        });
    }
}
