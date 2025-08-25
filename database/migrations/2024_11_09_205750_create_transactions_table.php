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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid("user_id")->constrained('users')->onDelete("cascade");
            $table->string("product_id");
            $table->integer("gym_id");
            $table->boolean("status_member")->default(false);
            $table->enum("type", ["Card Member", "Booking"])->default("Booking");
            $table->enum("status", ["pending", "accepted", "declined"])->default("pending");
            $table->date("date")->nullable();
            $table->integer("total_price");
            $table->string("snap_token")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
