<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //
    public function brand() {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function phoneVariants() {
        return $this->hasMany(PhoneVariants::class);
    }
}
