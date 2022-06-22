<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title',120);
            $table->string('slug',120);
            $table->text('content');
            $table->foreignId('user_id')->constrained()
                ->onUpdate('CASCADE')
                ->OnDelete('CASCADE');
            $table->boolean('answer_status')->default(0);
            $table->unsignedMediumInteger('best_answer')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
