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
        Schema::create('card_members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId("gym_id")->constrained("gyms")->onUpdate('cascade')->onDelete("cascade");
            $table->string('title');
            $table->integer('price');
            $table->string('description')->nullable();
            $table->integer('long');
            $table->enum('type', ['Hari','Minggu', 'Bulan', 'Tahun']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_members');
    }
};
