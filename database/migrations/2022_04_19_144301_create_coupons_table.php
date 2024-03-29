<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code',50)->unique();
            $table->enum('type',['fixed','percent']);
            $table->unsignedMediumInteger('value');
            $table->unsignedMediumInteger('cart_value');
            $table->unsignedMediumInteger('quantity');
            $table->unsignedMediumInteger('used')->default(0);
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
        Schema::dropIfExists('coupons');
    }
};
