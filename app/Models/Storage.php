<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $table = 'storages'; // Tên bảng
    protected $fillable = ['storage_size']; // Các cột có thể mass-assign

    public function phoneVariants() {
        return $this->hasMany(PhoneVariants::class);
    }
}
