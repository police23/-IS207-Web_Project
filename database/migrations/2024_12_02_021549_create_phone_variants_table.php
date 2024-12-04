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
        Schema::create('phone_variants', function (Blueprint $table) {
            $table->id();
            $table->string('phone_variants_name');
            $table->string('color');
            $table->string('image');
            $table->float('average_rate')->nullable();
            $table->unsignedInteger('quantity')->default(10);
            $table->unsignedBigInteger('regular_price')->default(0);
            $table->unsignedBigInteger('sale_price')->nullable();
            $table->enum('stock_status', ['instock','outofstock']);
            $table->boolean('featured')->default(false);
            $table->bigInteger('phone_id')->unsigned()->nullable();
            $table->bigInteger('storage_id')->unsigned()->nullable();
            $table->foreign('phone_id')->references('id')->on('phones')->onDelete('cascade');
            $table->foreign('storage_id')->references('id')->on('storages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_variants');
    }
};
