<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'description', 
        'screen_size', 
        'operating_system', 
        'processor', 
        'ram', 
        'battery', 
        'release_date'
    ]; // Add necessary attributes to fillable
    
    public function brand() {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function phoneVariants() {
        return $this->hasMany(PhoneVariants::class);
    }
}
