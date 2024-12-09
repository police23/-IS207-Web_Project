<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id(); // Primary key with auto-increment
            $table->unsignedBigInteger('cart_id'); // Foreign key to cart table
            $table->unsignedBigInteger('phone_variant_id'); // Foreign key to phone_variants table
            $table->integer('quantity');
            $table->timestamps(); // Includes created_at and updated_at

            // Define foreign key constraints
            $table->foreign('cart_id')->references('cart_id')->on('carts')->onDelete('cascade');
            $table->foreign('phone_variant_id')->references('id')->on('phone_variants')->onDelete('cascade');

            // Add unique constraint
            $table->unique(['cart_id', 'phone_variant_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_details');
    }
}