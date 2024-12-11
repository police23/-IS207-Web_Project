<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneVariants extends Model
{
    use HasFactory;
    
    protected $table = 'phone_variants';
    protected $fillable = [
        'phone_variants_name',
        'color', 
        'image', 
        'average_rate', 
        'quantity', 
        'regular_price', 
        'stock_status', 
        'featured',
        'phone_id',
        'storage_id'
    ]; // Add necessary attributes to fillable
    
    public function phone() {
        return $this->belongsTo(Phone::class, 'phone_id');
    }
    public function storage() {
        return $this->belongsTo(Storage::class, 'storage_id');
    }
    
}
