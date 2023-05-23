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
//            $table->foreignId('user_id')->constrained('users');
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('job_title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('physician_registrations');
    }
}
