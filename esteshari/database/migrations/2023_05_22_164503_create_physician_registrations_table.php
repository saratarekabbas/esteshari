<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicianRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('physician_registrations', function (Blueprint $table) {
            $table->id();

//          SECTION 1: PERSONAL INFO
            $table->string('title');
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('email_address');
            $table->string('alternative_email_address')->nullable();
            $table->string('nationality');
            $table->string('country_code ');
            $table->string('mobile_number');
            $table->string('telephone_number')->nullable();
            $table->string('street_address');
            $table->string('city');
            $table->string('state_province');
            $table->int('postal_code');
            $table->string('country');
            $table->json('identity_verification_files');













            $table->string('passport_file')->nullable(); // Column to store the file path
            $table->json('insurance_files')->nullable(); // Column to store the file path
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('physician_registrations');
    }
}
