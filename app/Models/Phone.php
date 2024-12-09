<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone_name',
        'screen_size',
        'ram',
        'operating_system',
        'processor',
        'battery',
        'description',
        'release_date',
        'phone_id',
        'brand_id'
        // Các trường khác (nếu có)
    ];
    
    public function brand() {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function phoneVariants() {
        return $this->hasMany(PhoneVariants::class);
    }
}
