<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBondSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bond_settings', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->decimal('post_petties', 18, 2);
            $table->decimal('search_fee', 18,2);
            $table->decimal('rates_application', 18,2);
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
        Schema::dropIfExists('bond_settings');
    }
}
