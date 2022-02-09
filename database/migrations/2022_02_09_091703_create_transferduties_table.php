<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferdutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferduties', function (Blueprint $table) {
            $table->id();
            $table->decimal("start_amount",18,2);
            $table->decimal("end_amount",18,2);
            $table->decimal('rates');
            $table->decimal('rate_amount',18,2);
            $table->string('description',50);
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
        Schema::dropIfExists('transferduties');
    }
}
