<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_name', // Thêm trường brand_name vào đây
        // Các trường khác (nếu có)
    ];
    public function phones() {
        return $this->hasMany(Phone::class);
    }
}
