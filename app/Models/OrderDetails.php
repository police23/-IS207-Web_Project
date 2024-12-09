<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details'; // Ensure the table name is correct
    protected $primaryKey = 'id'; // Define the primary key
    public $incrementing = true; // Ensure the primary key is auto-incrementing
    protected $fillable = ['order_id', 'phone_variant_id', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function phoneVariant()
    {
        return $this->belongsTo(PhoneVariants::class, 'phone_variant_id');
    }
}