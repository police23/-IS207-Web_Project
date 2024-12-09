<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneVariants extends Model
{
    use HasFactory;
    
    protected $table = 'phone_variants';
    
    
    public function phone() {
        return $this->belongsTo(Phone::class, 'phone_id');
    }
    public function storage() {
        return $this->belongsTo(Storage::class, 'storage_id');
    }
    
}
