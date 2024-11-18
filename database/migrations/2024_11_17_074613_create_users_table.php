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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');               // Primary Key
            $table->integer('role_id');           // Foreign Key
            $table->string('username', 50);       // Username
            $table->string('password', 100);      // Password
            $table->string('full_name', 100);     // Full Name
            $table->boolean('gender');            // Gender (1 for Male, 0 for Female)
            $table->string('address', 200);       // Address
            $table->string('phone_number', 10);   // Phone Number
            $table->timestamps();                 // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
