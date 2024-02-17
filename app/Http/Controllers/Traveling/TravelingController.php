<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City\City;
use App\Models\Country\Country;
use App\Models\Reservation\Reservation;
class TravelingController extends Controller
{
    public function about($id){
        $citySelectQuery = City::select()->orderBy('id','desc')->where('country_id',$id);
        $cities = $citySelectQuery->take(5)->get();
        
        $country = Country::select('name')->where('id',$id)->first();
        $countryName = $country !=null ? $country->name : '';
       $citiesCount = $citySelectQuery->count(); 
       
        return view('traveling.about',compact('cities','countryName','citiesCount'));
    }
    public function reservation($cityId){
        $city = City::select('name')->where('id',$cityId)->first();
        $cityName = $city !=null ? $city->name : '';
               
        return view('traveling.reservation',compact('cityName','cityId'));
    }
    public function makeReservation(){
        $data = request()->all();
    
        $result =  Reservation::create([
            'customer_name' => $data['customer_name'],
            'customer_phone' => $data['customer_phone'],
            'num_guests' => $data['num_guests'],
            'check_in_date' => $data['check_in_date'],
            'check_out_date' => $data['check_out_date'],
            'city_id' => $data['city_id'],
            'user_id' => $data['user_id'],
            'status' => 'pending'
            
        ]);
        if($result){
            return redirect()->back();
        }else{
            echo 'rid';
        }
        
    }
}
