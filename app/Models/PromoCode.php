<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $fillable = ['code','discount_amount','discount_percent','is_active','expires_at'];
    
}
