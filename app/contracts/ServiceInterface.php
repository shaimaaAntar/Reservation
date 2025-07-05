<?php

namespace App\Contracts;

interface ServiceInterface
{
    public function index();
    public function create(array $data);
    public function update($data , $id);
}
