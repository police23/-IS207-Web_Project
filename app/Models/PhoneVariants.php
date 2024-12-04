<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneVariants extends Model
{
   public function phone() {
        return $this->belongsTo(PhoneVariants::class,'phone_id');
    }
    public function storage() {
        return $this->belongsTo(Storage::class,'storage_id');
    }
}
