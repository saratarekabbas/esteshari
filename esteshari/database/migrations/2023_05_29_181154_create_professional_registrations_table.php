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
        Schema::create('professional_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_type');
            $table->string('registration_title');
            $table->string('registration_number');
            $table->date('registration_issue_date');
            $table->date('registration_expiry_date');
            $table->json('registration_files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_registrations');
    }
};
