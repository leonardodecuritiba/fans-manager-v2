<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('fan_id');
            $table->unsignedInteger('promotion_id');
            $table->unsignedInteger('status_coupon_id');
            $table->unsignedInteger('coupon_value_id');
            $table->unsignedInteger('voucher_id');
            $table->unsignedInteger('campaign_id');
            $table->foreign('fan_id')->references('id')->on('fans')->onDelete('cascade');
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');
            $table->foreign('coupon_value_id')->references('id')->on('coupon_values')->onDelete('cascade');
            $table->foreign('status_coupon_id')->references('id')->on('status_coupons')->onDelete('cascade');
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');

            $table->dateTime('used_at')->nullable();
            $table->dateTime('purchased_at')->nullable();
            $table->dateTime('returned_at')->nullable();
            $table->tinyInteger('expiration');
            $table->boolean('tipo');
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
}
