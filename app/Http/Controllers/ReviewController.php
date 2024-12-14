<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'rate' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Rating::create([
            'phone_variant_id' => $id,
            'user_id' => Auth::id(),
            'rate' => $request->rate,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rate' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = Rating::where('phone_variant_id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        $review->update([
            'rate' => $request->rate,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được cập nhật.');
    }

    public function canReview($id)
    {
        $user = Auth::user();
        $hasPurchased = $user->orders
            ->whereHas('orderDetails', function ($query) use ($id) {
                $query->where('phone_variant_id', $id)
                      ->where('status', 'Delivered');
            })
            ->exists();

        return response()->json(['canReview' => $hasPurchased]);
    }
}
