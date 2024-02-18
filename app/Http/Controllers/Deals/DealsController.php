<?php

namespace App\Http\Controllers\Deals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country\Country;
use App\Models\City\City;
use Illuminate\Support\Facades\DB;

DB::enableQueryLog();

class DealsController extends Controller
{
    public function dealsView()
    {
        $countries = Country::getCountriesNames();
        $cities = City::all();
        return view("deals", compact('countries', 'cities'));
    }

    public function search(Request $request)
    {
        $countries = Country::getCountriesNames();

        $priceRange = explode('.', $request->price);
        if ($priceRange[1] == null) {
            $where = "price >= $priceRange[0]";
        } else {
            $where = "price between $priceRange[0] AND $priceRange[1]";
        }
        $cities = DB::select("select * from cities where country_id =$request->country_id  AND $where");

        // $cities = City::select()->where('country_id', $request->country_id)->whereBetween('price', [(int) $priceRange[0], (int) $priceRange[1]])->get();
        // $lastQuery = (DB::getQueryLog());
        return view("deals", compact('cities', 'countries'));

    }
}
