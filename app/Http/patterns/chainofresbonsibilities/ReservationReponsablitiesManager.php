<?php

namespace App\Http\Patterns\chainofresbonsibilities;

class ReservationReponsablitiesManager
{
    public $next = null;
    public function setNext($next)
    {
        $this->next = $next;
    }

    public function handle($data)
    {
        if($this->next){
            $this->next->handle($data);
        }
//        return $data;
    }


}
