<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'cart_id',
        'nama_penerima',
        'number',
        'alamat'
    ];

    public function cart() {
        return $this->belongsTo('App\Models\Cart', 'cart_id');
    }
}
