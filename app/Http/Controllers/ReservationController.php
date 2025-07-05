<?php

namespace App\Http\Controllers;

use App\Contracts\ReservationInterface;
use App\Http\Requests\ReservationRequest;
use App\traits\defaultControllerTrait;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
  private  $formRequest = ReservationRequest::class;
    use defaultControllerTrait;
    public function __construct(private ReservationInterface $repository)
    {

    }
}
