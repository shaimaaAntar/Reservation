<?php

namespace App\Http\Patterns\chainofresbonsibilities;

use App\Models\User;

class DoctorAvailabilityCheck extends ReservationReponsablitiesManager
{

    public function handle($data)
    {
        if ($data['doctor_id']) $doctor = User::find($data['doctor_id']);
        if ($doctor && $doctor->is_available) {
            Parent::handle($data);
        }else{
            abort('Doctor is not available');
        }
    }
}
