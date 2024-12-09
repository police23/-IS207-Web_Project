<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // Ensure the table name is correct
    protected $primaryKey = 'order_id'; // Define the primary key
    protected $fillable = ['user_id', 'total_price', 'status', 'delivery_address', 'payment_method'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}