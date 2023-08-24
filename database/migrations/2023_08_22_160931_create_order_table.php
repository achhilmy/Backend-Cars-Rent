<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('orderId');
            $table->string('pickUpLoc');
            $table->string('dropOffLoc');
            $table->string('pickUpDate');
            $table->string('dropOffDate');
            $table->string('pickUpTime');
            $table->integer('carId');
            $table->integer('userId');
            $table->integer('adminId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
