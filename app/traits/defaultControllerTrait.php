<?php

namespace App\traits;

use Illuminate\Http\Request;

trait defaultControllerTrait
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->repository->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
//
//        $data = request()->validate(app($this->formRequest)->rules());
//        dd('hereController',$data);

        $this->repository->create(request()->all());
//        $this->repository->create(request()->all());
        dump(' created');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = request()->validate(app($this->formRequest)->rules());
        $this->repository->update($id, $request);
        dump('Service updated');
    }
}
