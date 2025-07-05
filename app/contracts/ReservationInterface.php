<?php

namespace App\Contracts;

interface ReservationInterface
{
    public function index();
    public function create(array $data);
    public function update($data,int $id);
}
