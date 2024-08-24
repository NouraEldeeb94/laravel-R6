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
        'description',
        'published',
        'image',
        'category_id',

        
    ];

    public function Category() {
        return $this->belongsTo(Category::class);
    }
    
}
