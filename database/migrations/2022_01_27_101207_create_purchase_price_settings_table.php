<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasePriceSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_price_settings', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->decimal('start_amount',18,2);
            $table->decimal('end_amount', 18,2);
            $table->decimal('tarrif_fee', 18, 2);
            $table->decimal('deeds_office', 18,2);
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_price_settings');
    }
}
