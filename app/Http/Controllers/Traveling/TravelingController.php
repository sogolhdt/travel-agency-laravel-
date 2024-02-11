<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City\City;
class TravelingController extends Controller
{
    public function about($id){
        $cities = City::select()->orderBy('id','desc')->take(5)->where('country_id',$id);
        return view('traveling.about',compact('cities'));
  
    }
}
