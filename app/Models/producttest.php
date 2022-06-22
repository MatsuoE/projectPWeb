<?php

namespace App\Models;


class product
{
    private static $post_product = [
        [
            "nama" => "kulkas samsung 4 pintu",
            "slug" => "kulkas-samsung-4-pintu",
            "harga" => "Rp 14.000.000,-",
            "body" => "ini adalah kulkas 4 pintu dari samsung dengan teknologi freezing"
        ],
        [
            "nama" => "TV samsung 50 inch",
            "slug" => "tv-samsung-50-inch",
            "harga" => "Rp 14.000.000,-",
            "body" => "ini adalah tv 50inch dari samsung dengan UHD TV"
        ]
        ];
    public static function all(){
        return collect(self::$post_product);
    }
    public static function find($slug){
        $product = static::all();
        return $product->firstWhere('slug', $slug);
    }
}
