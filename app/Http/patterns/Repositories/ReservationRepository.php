<?php
namespace App\Http\Patterns\Repositories;
use App\Contracts\ReservationInterface;
use App\Http\Patterns\chainofresbonsibilities\CityCheck;
use App\Http\Patterns\chainofresbonsibilities\DoctorAvailabilityCheck;
use App\Http\Services\TotalCostService;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationRepository implements ReservationInterface
{
    public function index()
    {
        $reservations = Reservation::query()->where('doctor_id', Auth::id())->latest()->get();
        return response($reservations, 200);
    }

    public function create(array $data)
    {
//        dd('repo');
        $CheckAvailability=new DoctorAvailabilityCheck();
        $cityCheck=new CityCheck();
        $CheckAvailability->setNext($cityCheck);
         $CheckAvailability->handle($data);

       $total_cost=new TotalCostService;
       $data['total_cost']=$total_cost->TotalCost($data['city_id'],$data['service_id']);
//       $data['client_id']=Auth::id();
       $data['client_id']=2;

       Reservation::query()->create($data);
     dd('success',$data);


    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }
}
