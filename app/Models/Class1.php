<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Class1 extends Model
{
    use HasFactory, SoftDeletes;
     
    protected $table ='classes';

    protected $fillable = [
        'classname',
        'price',
        'description',
        'time_from',
        'time_to',
        'capacity',
        'is_fulled',
        
    ];
}
