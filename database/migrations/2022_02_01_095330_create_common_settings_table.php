<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('vat_amount');
            $table->decimal('deeds_office', 18,2);
            $table->decimal('tarrif_fee', 18,2);
            $table->decimal('post_petties', 18,2);
            $table->decimal('search_fee', 18,2);
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
        Schema::dropIfExists('common_settings');
    }
}
