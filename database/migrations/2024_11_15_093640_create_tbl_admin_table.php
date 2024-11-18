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
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id();
            $table->string('phone_code')->unique();
            $table->string('phone_name');
            $table->string('brand_name');
            $table->string('color');
            $table->string('camera');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->integer('storage');
            $table->integer('stock_quantity');
            $table->string('status');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};
