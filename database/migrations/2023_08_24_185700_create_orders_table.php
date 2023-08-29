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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('contacts')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->integer('year')->nullable();
            $table->string('engine_type')->nullable();;
            $table->float('engine_capacity')->nullable();
            $table->string('transmission');
            $table->string('drive')->nullable();;
            $table->integer('horse_power')->nullable();
            $table->string('car_body')->nullable();;
            $table->string('wheel')->nullable();;
            $table->string('quality')->nullable();;
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
        Schema::dropIfExists('orders');
    }
};
