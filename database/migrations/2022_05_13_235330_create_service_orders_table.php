<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->string('client');
            $table->string('vehicle_name');
            $table->string('chassi', 16)->unique();
            $table->string('year');
            $table->string('license_plate', 7)->unique();
            $table->foreignId('mechanic_id')->nullable();
            $table->string('status');
            $table->text('description')->nullable();
            $table->float('total_value')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_orders');
    }
};
