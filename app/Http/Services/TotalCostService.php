<?php

namespace App\Http\Services;

use App\Models\doctor_available_cities;
use App\Models\Service;

class TotalCostService
{
    public function TotalCost($city_id,$service_id)
    {
        //city cost
        $city_cost=doctor_available_cities::query()->where('city_id',$city_id)->first();
        if ($city_cost) {
            $city_cost=$city_cost->transfer_cost;
        }

        //service cost
        $service_cost=Service::query()->find($service_id)->first();
        if ($service_cost) {
            $service_cost=$service_cost->price;
        }

        $total_cost=$city_cost+$service_cost;

        return $total_cost;
    }
}
