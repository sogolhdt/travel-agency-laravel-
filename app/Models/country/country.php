<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // use HasFactoriay; 
 
    protected $table = "countries";
    protected $fillables =[
        'name',
        'population',
        'territory',
        'avg_price',
        'image',
        'description',
        'continent',
    ];
    public $timestamps = true; 
}
