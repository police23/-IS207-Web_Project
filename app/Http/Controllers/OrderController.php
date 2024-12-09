<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // ...existing code...

    public function cancelOrder(Order $order)
    {
        $order->update(['status' => 'Canceled']);
        return redirect()->route('account.orders')->with('success', 'Đơn hàng đã được hủy.');
    }

    // ...existing code...
}