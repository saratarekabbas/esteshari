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
//            $table->string('passport_file')->nullable(); // Column to store the file path
//            $table->json('insurance_files')->nullable(); // Column to store the file path
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('physician_registrations');
    }
}
