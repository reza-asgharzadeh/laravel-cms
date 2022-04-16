<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('course_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->float('amount');
            $table->string('authority')->nullable();
            $table->string('RefID')->nullable();
            $table->integer('order_code')->unique();
            $table->integer('payment_type')->nullable();
            $table->string('gateway_name')->nullable();
            $table->string('status_code');
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
        Schema::dropIfExists('payments');
    }
};
