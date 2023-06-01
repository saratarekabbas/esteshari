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
        Schema::create('language_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('qualification_type')->nullable();
            $table->string('qualification_title')->nullable();
            $table->string('qualification_issuing_board')->nullable();
            $table->date('qualification_issue_date')->nullable();
            $table->date('qualification_expiry_date')->nullable();
            $table->json('qualification_files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_qualifications');
    }
};
