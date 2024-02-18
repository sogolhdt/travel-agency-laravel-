<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // use HasFactoriay; 

    protected $table = "countries";
    protected $fillables = [
        'name',
        'population',
        'territory',
        'avg_price',
        'image',
        'description',
        'continent',
    ];
    public $timestamps = true;

    public static function getCountriesNames()
    {

        $countries = [];

        // get countries names list
        $countriesDb = Country::pluck('name', 'id');
        if ($countriesDb != null) {
            foreach ($countriesDb as $id => $country) {
                $countries[] = [
                    'id' => $id,
                    'name' => $country
                ];
            }
        }
        return $countries;

    }
}
