<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class UserController extends Controller
{
    public function index()
    {
        // Lấy tất cả dữ liệu người dùng từ bảng users
        $users = Customer::all();

        // Truyền dữ liệu vào view 'customer'
        return view('admin.customer', compact('users'));
    }
}
