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
        Schema::create('personal_informations', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('email_address');
            $table->string('alternative_email_address');
            $table->string('nationality');
            $table->integer('country_code');
            $table->integer('mobile_number');
            $table->integer('telephone_number');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('state');
            $table->integer('postal_code');
            $table->string('country');
            $table->json('identity_verification_files');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_informations');
    }
};
