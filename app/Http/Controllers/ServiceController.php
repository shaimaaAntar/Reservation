<?php

namespace App\Http\Controllers;

use App\Contracts\ServiceInterface;
use App\Http\Requests\ServiceFormRequest;
use App\traits\defaultControllerTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use defaultControllerTrait;
//    private ServiceFormRequest $formRequest;
    private $formRequest = ServiceFormRequest::class;

    public function __construct(private ServiceInterface $repository)
    {

    }


}
