<?php

namespace App\Services;

use App\Http\Resources\Address\AddressResource;
use App\Models\Address;
use App\Responses\ErrorResponse;
use App\Responses\SuccessResponse;

class AddressService extends Service
{

    public function __construct(Address $model ,SuccessResponse $success_response , ErrorResponse $error_response )
    {
        $this->model = $model;
        $this->success_response = $success_response;
        $this->error_response = $error_response;
    }
    public function select()
    {
        $address = $this->model->getAllAddress();
        return $this->success_response->response(AddressResource::collection($address));
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function  delete()
    {

    }
}
