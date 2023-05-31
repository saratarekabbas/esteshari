<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('educational_qualifications', function (Blueprint $table) {
            $table->unsignedBigInteger('award_id')->nullable();
            $table->foreign('award_id')->references('id')->on('honors_awards');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('educational_qualifications', function (Blueprint $table) {
            //
        });
    }
};
