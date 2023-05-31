<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('board_certifications', function (Blueprint $table) {
            $table->id();
            $table->string('certification_type');
            $table->string('certification_title');
            $table->string('certification_issuing_board');
            $table->date('certification_issue_date');
            $table->date('certification_expiry_date')->nullable();
            $table->string('certification_credential_id')->nullable();
            $table->string('certification_credential_url')->nullable();
            $table->json('certification_files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_certifications');
    }
};
