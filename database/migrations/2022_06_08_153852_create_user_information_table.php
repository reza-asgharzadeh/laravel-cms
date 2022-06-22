<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->string('birthday',10)->nullable();
            $table->string('job',200)->nullable();
            $table->text('about_me')->nullable();
            $table->string('website',120)->nullable();
            $table->string('github',120)->nullable();
            $table->string('linkedin',120)->nullable();
            $table->string('telegram',120)->nullable();
            $table->string('instagram',120)->nullable();
            $table->string('twitter',120)->nullable();
            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('user_information');
    }
};
