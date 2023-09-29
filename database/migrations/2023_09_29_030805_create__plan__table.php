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
        Schema::create('_plan_', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('profile_id');

            $table->foreign('plan_id')
                        ->references('id')
                        ->on('plans')
                        ->onDelete('cascade');
            $table->foreign('profile_id')
                        ->references('id')
                        ->on('profiles')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_plan_');
    }
};
