<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address\AddressCreateRequest;
use App\Http\Requests\Address\AddressUpdateRequest;
use App\Services\AddressService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddressController extends Controller
{
    public function __construct(AddressService $service)
    {
        $this->service = $service;
    }

    public function select()
    {
        return $this->service->select();
    }

    public function create(AddressCreateRequest $request)
    {
        return $this->service->create($request);
    }

    public function update(AddressUpdateRequest $request , $id)
    {
        return $this->service->update($request,$id);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }

}
