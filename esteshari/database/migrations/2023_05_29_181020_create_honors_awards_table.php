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
        Schema::create('honors_awards', function (Blueprint $table) {
            $table->id();
          //            AWARDS
            $table->string('award_type');
            $table->string('award_title');
            $table->date('date_of_award');
            $table->text('award_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('honors_awards');
    }
};
