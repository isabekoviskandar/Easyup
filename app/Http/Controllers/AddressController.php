<?php

namespace App\Http\Controllers;

use App\Services\AddressService;
use Illuminate\Http\Request;

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
}
