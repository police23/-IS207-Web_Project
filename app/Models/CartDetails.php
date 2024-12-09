<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'phone_variant_id',
        'quantity',
        // ...existing code...
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function phoneVariants()
    {
        return $this->belongsTo(PhoneVariants::class, 'phone_variant_id');
    }

    // Removed the phone relationship method
}