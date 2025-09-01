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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreignId('address_id')->constrained('addresses');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->date('birthday');
            $table->string('ielts_level')->nullable();
            $table->string('user_type')->nullable();
            $table->string('type')->nullable();
            $table->string('suggested_from')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
