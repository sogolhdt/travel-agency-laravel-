<?php

namespace App\Http\Controllers\Deals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country\Country;
use App\Models\City\City;

class DealsController extends Controller
{
    public function dealsView()
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

        return view("deals", compact('countries'));
    }

    public function search(Request $request)
    {
        // dd($request->all());

        $result = [];


        $cities = City::select()->where('country_id', $request->country_id);
    }
}
