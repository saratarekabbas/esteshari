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
        Schema::create('physician_references', function (Blueprint $table) {
            $table->id();
            $table->string('reference_title');
            $table->string('reference_full_name');
            $table->string('reference_relationship');
            $table->string('reference_email_address');
            $table->integer('country_code');
            $table->bigInteger('mobile_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physician_references');
    }
};
