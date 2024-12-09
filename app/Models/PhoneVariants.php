<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneVariants extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone_variants_name',
        'color',
        'image',
        'storage_id',
        'regular_price',
        'sale_price',
        'stock_status',
        'description',
        'phone_id',
        // Các trường khác (nếu có)
    ];
   public function phone() {
        return $this->belongsTo(PhoneVariants::class,'phone_id');
    }
    public function storage() {
        return $this->belongsTo(Storage::class,'storage_id');
    }
}
