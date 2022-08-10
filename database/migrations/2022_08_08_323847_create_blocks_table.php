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
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wh_id')->constrained('whs');
            $table->foreignId('booking_id')->nullable()->constrained('bookings');
            $table->boolean('empty')->default(true);
            $table->unsignedFloat('length', 6,3)->default(2);
            $table->unsignedFloat('width', 6,3)->default(1);
            $table->unsignedFloat('height', 6,3)->default(1);
            $table->unsignedFloat('volume', 6,3)->default(2);
            $table->unsignedFloat('price', 7,2)->default(10);
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
        Schema::dropIfExists('blocks');
    }
};
