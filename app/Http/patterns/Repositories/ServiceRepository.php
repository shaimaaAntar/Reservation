<?php

namespace App\Http\Patterns\Repositories;
use App\Contracts\ServiceInterface;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceRepository implements ServiceInterface
{

    public function index()
    {
        // TODO: Implement index() method.
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
