<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    // protected $fillable = [
    //     'name','slug'
    // ];

    public function product(){
        return $this->hasMany(product::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name', 'id']
            ]
        ];
    }
}
