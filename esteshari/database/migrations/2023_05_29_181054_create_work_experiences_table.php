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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('employer_name');
            $table->string('employment_type');
            $table->date('start_date_of_employment');
            $table->date('end_date_of_employment')->nullable();
            $table->boolean('current_role');
            $table->string('job_location_city');
            $table->string('job_location_country');
            $table->string('location_type');
            $table->text('job_description')->nullable();
            $table->json('job_experience_files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
