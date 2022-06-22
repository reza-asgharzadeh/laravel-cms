<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->string('btn_txt',50);
            $table->string('link',150);
            $table->string('title_color',7);
            $table->string('btn_color',7);
            $table->string('btn_bg_color',7);
            $table->string('btn_bg_hover_color',7);
            $table->string('bg_color',7);
            $table->timestamp('expiry_date')->useCurrent();
            $table->boolean('is_approved')->default(0);
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
        Schema::dropIfExists('alerts');
    }
};
