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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Tự động tạo cột id (primary key)
            $table->string('product_code')->unique(); // Mã sản phẩm, unique
            $table->string('product_name'); // Tên sản phẩm
            $table->string('brand_name'); // Tên thương hiệu
            $table->string('category')->nullable(); // Loại sản phẩm
            $table->string('color')->nullable(); // Màu sắc
            $table->integer('quantity'); // Số lượng
            $table->decimal('price', 10, 2); // Giá
            $table->string('storage')->nullable(); // Dung lượng lưu trữ (nếu có)
            $table->integer('stock_quantity'); // Số lượng tồn kho
            $table->boolean('status')->default(1); // Trạng thái (1: active, 0: inactive)
            $table->string('image')->nullable(); // Đường dẫn ảnh
            $table->text('description')->nullable(); // Mô tả
            $table->timestamps(); // Tự động thêm created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
