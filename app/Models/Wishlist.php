<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $guard = 'admin';

    protected $fillable = [
        'product_id',
        'wishqty',
        'user_id',

    ];

    public function product(){


        return $this->belongsTo(Product::class,'product_id');
    }

}
