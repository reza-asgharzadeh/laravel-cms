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
            $table->string('transaction_id',100)->nullable();
            $table->string('RefID',100)->nullable();
            $table->unsignedInteger('total');
            $table->string('description',255);
            $table->enum('payment_type',['gateway','card','wallet','cash'])->nullable()->default('gateway');
            $table->string('gateway_name',60)->nullable();
            $table->morphs('paymentable');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('payments');
    }
};
