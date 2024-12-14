<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\PhoneVariants;
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

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $request->input('total_price'),
                'status' => 'Ordered',
                'delivery_address' => $request->input('address'),
                'payment_method' => $request->input('checkout_payment_method'),
            ]);

            foreach (json_decode($request->input('cart_items'), true) as $item) {
                $phoneVariant = PhoneVariants::find($item['phone_variant_id']);
                if ($phoneVariant) {
                    $phoneVariant->quantity -= $item['quantity'];
                    $phoneVariant->save();

                    OrderDetails::create([
                        'order_id' => $order->order_id,
                        'phone_variant_id' => $item['phone_variant_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }
            }

            // Clear the user's cart
            Cart::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('order.confirmation');
    }
}