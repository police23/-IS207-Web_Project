<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\PhoneVariants;

class OrderController extends Controller
{
    // ...existing code...

    public function cancelOrder($orderId)
    {
        $order = Order::find($orderId);

        if ($order && $order->status != 'Canceled') {
            foreach ($order->orderDetails as $detail) {
                $phoneVariant = PhoneVariants::find($detail->phone_variant_id);
                if ($phoneVariant) {
                    $phoneVariant->quantity += $detail->quantity;
                    $phoneVariant->save();
                }
            }

            $order->status = 'Canceled';
            $order->save();
        }

        return redirect()->route('account.orders')->with('success', 'Đơn hàng đã được hủy.');
    }

    // ...existing code...
}