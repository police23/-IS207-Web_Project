<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // Primary key with auto-increment
            $table->unsignedBigInteger('order_id'); // Foreign key to orders table
            $table->unsignedBigInteger('phone_variant_id'); // Foreign key to phone_variants table
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps(); // Includes created_at and updated_at

            // Define foreign key constraints
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('phone_variant_id')->references('id')->on('phone_variants')->onDelete('cascade');

            // Add unique constraint
            $table->unique(['order_id', 'phone_variant_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}