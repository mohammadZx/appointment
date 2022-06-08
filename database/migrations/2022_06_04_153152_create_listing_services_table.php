<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('listing_id');
            $table->bigInteger('sub_service_id');
            $table->integer('capacity')->default(1);
            $table->integer('time');
            $table->bigInteger('price');
            $table->boolean('is_price_from')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_services');
    }
};
