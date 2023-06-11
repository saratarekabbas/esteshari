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
        Schema::create('physician_schedule', function (Blueprint $table) {
            $table->id();
            $table->date('slot_date');
            $table->time('slot_time');
            $table->string('status')->default('available');
            $table->string('currency')->default('MYR');
            $table->string('meeting_link', 500)->nullable();
            $table->decimal('price', 10,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physician_schedule');
    }
};
