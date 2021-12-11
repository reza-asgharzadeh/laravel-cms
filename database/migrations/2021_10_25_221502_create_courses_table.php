<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('meta_description');
            $table->string('banner');
            $table->string('img_alt');
            $table->integer('price');
            $table->longText('content');
            $table->integer('view_count')->default(0);
            $table->integer('student_count')->default(0);
            $table->string('pre_course');
            $table->string('time');
            $table->boolean('course_status');
            $table->integer('course_level');
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
        Schema::dropIfExists('courses');
    }
}
