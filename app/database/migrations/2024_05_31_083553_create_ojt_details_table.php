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
        Schema::create('ojt_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('required_hours')->nullable();
            $table->integer('rendered_hours')->nullable();
            $table->integer('remaining_hours')->nullable();
            $table->boolean('has_endorsement_letter')->nullable();
            $table->boolean('has_acceptance_letter')->nullable();
            $table->date('onboard_at')->nullable();
            $table->date('exit_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ojt_details');
    }
};
