<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type');
            $table->string('plate', 10);
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();
            $table->time('total_time')->nullable();
            $table->decimal('final_cost', 4, 2)->nullable();
            $table->string('created_by');
            $table->boolean('is_parked')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
