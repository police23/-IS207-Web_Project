<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::with('cartDetails.phoneVariants.phone')
                    ->where('user_id', Auth::id())
                    ->first();

        return view('checkout', compact('cart'));
    }

    public function update(Request $request)
    {
        $quantities = json_decode($request->input('updated_quantities'), true);
        foreach ($quantities as $id => $quantity) {
            $cartDetail = CartDetails::findOrFail($id);
            $cartDetail->quantity = $quantity;
            $cartDetail->save();
        }
        return redirect()->route('checkout.index');
    }

    public function orderConfirmation()
    {
        $order = Order::with('orderDetails.phoneVariant.phone')
                      ->where('user_id', Auth::id())
                      ->latest()
                      ->first();

        return view('order_confirmation', compact('order'));
    }

    // public function store(Request $request)
    // {
        
    //     DB::transaction(function () use ($request) {
    //         $order = Order::create([
    //             'user_id' => Auth::id(),
    //             'total_price' => $request->input('total_price'),
    //             'status' => 'Ordered',
    //             'delivery_address' => $request->input('address'),
    //             'payment_method' => $request->input('checkout_payment_method'),
    //         ]);

    //         foreach (json_decode($request->input('cart_items'), true) as $item) {
    //             OrderDetails::create([
    //                 'order_id' => $order->order_id,
    //                 'phone_variant_id' => $item['phone_variant_id'],
    //                 'quantity' => $item['quantity'],
    //                 'price' => $item['price'],
    //             ]);
    //         }
            
    //         // Clear the user's cart
    //         Cart::where('user_id', Auth::id())->delete();
    //     });
        
    //     return redirect()->route('order.confirmation');
    // }

    public function store(Request $request)
{
    $paymentMethod = $request->input('checkout_payment_method');

    // Lưu thông tin giỏ hàng và địa chỉ trong session để sử dụng sau (trường hợp VNPay)
    if ($paymentMethod === 'bank_transfer') {
        session([
        'cart_items' => json_decode($request->input('cart_items'), true),
        'delivery_address' => $request->input('address'),
        'total_price' => $request->input('total_price'),
    ]);
   
        // Chuyển hướng sang VNPay
        return redirect()->route('payment.vnpay', [
            'total_price' => $request->input('total_price'),
        ]);
        
    }
    

     
        // Tạo đơn hàng ngay lập tức cho phương thức khác VNPay
        $order = DB::transaction(function () use ($request) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $request->input('total_price'),
                'status' => 'Ordered',
                'delivery_address' => $request->input('address'),
                'payment_method' => $request->input('checkout_payment_method'),
            ]);

            foreach (json_decode($request->input('cart_items'), true) as $item) {
                OrderDetails::create([
                    'order_id' => $order->order_id,
                    'phone_variant_id' => $item['phone_variant_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            // Clear the user's cart
            Cart::where('user_id', Auth::id())->delete();

            return $order;
        });

        return redirect()->route('order.confirmation')->with('success', 'Đơn hàng đã được tạo thành công!');
    }
}


