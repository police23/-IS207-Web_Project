<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';
    protected $primaryKey = 'rating_id';
    protected $fillable = [
        'phone_variant_id',
        'user_id',
        'rate',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}