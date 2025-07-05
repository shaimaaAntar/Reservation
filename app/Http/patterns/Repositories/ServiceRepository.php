<?php

namespace App\Http\Patterns\Repositories;
use App\Contracts\ServiceInterface;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceRepository implements ServiceInterface
{

    public function index()
    {
        $services = Service::all();
        return response($services, 200);

    }

    public function create(array $data)
    {
        Service::query()->create($data);

    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }
}
