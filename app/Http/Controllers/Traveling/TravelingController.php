<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City\City;
use App\Models\Country\Country;
class TravelingController extends Controller
{
    public function about($id){
        $cities = City::select()->orderBy('id','desc')->take(5)->where('country_id',$id)->get();
        $country = Country::select('name')->where('id',$id)->first();
        // dd($country);
        $countryName = $country !=null ? $country->name : '';
        return view('traveling.about',compact('cities','countryName'));
    }
}
