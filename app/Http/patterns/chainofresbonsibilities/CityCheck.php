<?php

namespace App\Http\Patterns\chainofresbonsibilities;

use App\Models\doctor_available_cities;

class CityCheck extends ReservationReponsablitiesManager
{

    public function handle($data)
    {
        $cityID=$data['city_id'];
        $city=doctor_available_cities::query()
            ->where('city_id',$cityID);
        if($city->exists()){
            Parent::handle($data);
        }else{
            abort('city not supported');
        }
    }
}
