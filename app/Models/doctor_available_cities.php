<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor_available_cities extends Model
{
    use HasFactory;
    protected $fillable=['id','city_id','user_id','transfer_cost'];
}
