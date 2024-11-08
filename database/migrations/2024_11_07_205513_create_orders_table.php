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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained('users')->onDelete("cascade");
            $table->foreignId("gym_id")->constrained('gyms')->onDelete("cascade");
            $table->foreignId("pelatih_id")->constrained('pelatihs')->onDelete("cascade");
            $table->array("latihans");
            $table->enum("status", ["pending", "accepted", "declined"])->default("pending");
            $table->date("date");
            $table->integer("total_price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
