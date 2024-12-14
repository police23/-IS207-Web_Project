<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'type', 'value', 'usage_count', 'max_usage', 'minimum_order_value', 'expiry_date'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'coupon_id');
    }
}
