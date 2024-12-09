<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;

class UserController extends Controller
{
    public function index() {
        return view('user.index');
    }

    public function profile() {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function changePassword() {
        return view('user.change-password');
    }

    public function updateProfile(Request $request) {
        $user = Auth::user();
        $request->validate([
            'username' => 'required|string|max:255',
            'fullname' => 'nullable|string|max:255',
            'gender' => 'required|integer',
            'address' => 'nullable|string|max:255',
            'phonenumber' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:255',
            'image_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $message = 'Cập nhật thông tin thành công';

        if ($request->hasFile('image_profile')) {
            if ($user->image_profile && file_exists(public_path('images/avatar/' . $user->image_profile))) {
                unlink(public_path('images/avatar/' . $user->image_profile));
            }

            $image = $request->file('image_profile');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/avatar'), $filename);
            $user->image_profile = $filename;
        }

        $user->fill($request->only(['username', 'fullname', 'gender', 'address', 'phonenumber', 'email']));
        $user->save();

        return redirect()->route('profile')->with('success', $message);
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Mật khẩu hiện tại không chính xác']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('change-password')->with('success', 'Đổi mật khẩu thành công');
    }

    public function orders() {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('account_orders', compact('orders'));
    }

    public function orderDetails($id) {
        $order = Order::with('orderDetails.phoneVariant.phone')->where('user_id', Auth::id())->where('order_id', $id)->firstOrFail();
        return view('account_order_details', compact('order'));
    }
}
