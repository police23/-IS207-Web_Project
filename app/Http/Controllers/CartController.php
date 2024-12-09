<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartDetails;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('cartDetails.phoneVariants.phone', 'cartDetails.phoneVariants.storage')
                    ->where('user_id', Auth::id())
                    ->first();

        return view('cart', compact('cart'));
    }

    public function destroy($id)
    {
        $cartDetail = CartDetails::findOrFail($id);
        $cartDetail->delete();

        return response()->json(['success' => true]);
    }

    public function updateCartSession(Request $request)
    {
        $cartItems = $request->input('cartItems', []);
        $totalPrice = $request->input('totalPrice', 0);

        session(['cart' => $cartItems, 'cart_total' => $totalPrice]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request)
    {
        $quantities = $request->input('quantities');
        $errors = [];
        foreach ($quantities as $id => $quantity) {
            $cartDetail = CartDetails::find($id);
            if ($cartDetail) {
                $maxQuantity = $cartDetail->phoneVariants->quantity;
                if ($quantity > $maxQuantity) {
                    $errors[$id] = 'Sản phẩm không đủ số lượng';
                } else {
                    $cartDetail->quantity = $quantity;
                    $cartDetail->save();
                }
            }
        }
        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors);
        }
        return redirect()->route('checkout.index');
    }

    public function add(Request $request)
    {
        $userId = Auth::id();
        $phoneVariantId = $request->input('phone_variant_id');
    

        $cart = Cart::firstOrCreate(['user_id' => $userId]);

        $cartDetail = CartDetails::firstOrCreate(
            ['cart_id' => $cart->cart_id, 'phone_variant_id' => $phoneVariantId],
            ['quantity' => 1]
        );
        

        if (!$cartDetail->wasRecentlyCreated) {
            $cartDetail->quantity += 1;
            $cartDetail->save();
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }
}