<?php

namespace App\Models\Reservation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Reservation extends Model
{
    use HasFactory;
    protected $table = 'Reservations';
    protected $fillable =[
        'customer_name',
        'customer_phone',
        'num_guests',
        'check_in_date',
        'check_out_date',
        'city_id',
        'user_id',
        'status'
    ];
  
}
