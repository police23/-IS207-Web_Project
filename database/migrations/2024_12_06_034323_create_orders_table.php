<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id'); // Primary key, auto-increment
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('total_price');
            $table->string('status');
            $table->string('delivery_address');
            $table->string('payment_method'); // New column
            $table->unsignedBigInteger('coupon_id')->nullable(); // Foreign key to coupons table
            $table->timestamps(); // Includes created_at and updated_at
            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}