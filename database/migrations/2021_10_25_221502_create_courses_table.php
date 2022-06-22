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
            $table->string('name',200);
            $table->string('slug',200)->unique();
            $table->string('description',255);
            $table->string('keywords',200);
            $table->string('banner',150);
            $table->string('img_alt',150);
            $table->unsignedMediumInteger('price');
            $table->mediumText('content');
            $table->unsignedMediumInteger('view_count')->default(0);
            $table->unsignedSmallInteger('student_count')->default(0);
            $table->string('pre_course',200);
            $table->string('time',9);
            $table->boolean('course_status');
            $table->unsignedTinyInteger('course_level');
            $table->boolean('is_approved');
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
        Schema::dropIfExists('courses');
    }
}
