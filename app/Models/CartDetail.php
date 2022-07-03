<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $table = 'cart_detail';
    protected $fillable = [
        'produk_id',
        'cart_id',
        'qty',
        'harga',
        'subtotal',
    ];

    public function cart() {
        return $this->belongsTo('App\Models\Cart', 'cart_id');
    }

    public function produk() {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    // function untuk update qty, sama subtotal
    public function updatedetail($itemdetail, $qty, $harga) {
        $this->attributes['qty'] = $itemdetail->qty + $qty;
        $this->attributes['subtotal'] = $itemdetail->subtotal + ($qty * $harga);
        self::save();
    }
}
