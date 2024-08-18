<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_title',
        'price',
        'category_id',
        'description',
        'published',
        'image',
       

        
    ];

    // public function category() {
    //     return $this->belongsTo(Category::class);
    // }
}
