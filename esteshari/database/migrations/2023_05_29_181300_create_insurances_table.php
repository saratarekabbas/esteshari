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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('insurance_type')->nullable();
            $table->string('insurance_title')->nullable();
            $table->string('insurance_number')->nullable();
            $table->date('insurance_issue_date')->nullable();
            $table->date('insurance_expiry_date')->nullable();
            $table->json('insurance_files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurances');
    }
};
