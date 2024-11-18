<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Đảm bảo đã import model Product

class ProductController extends Controller
{
    public function index()
{
    $products = Product::all(); // Lấy tất cả sản phẩm
    return view('admin.product', compact('products')); // Trỏ tới view 'admin.product'
}

}
