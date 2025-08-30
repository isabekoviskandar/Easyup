<?php

namespace App\Services;

use App\Http\Resources\Address\AddressResource;
use App\Models\Address;
use App\Models\Constant;
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

    public function create($request)
    {
        $address = $this->model->create($request->all());
        return $this->success_response->response(new AddressResource($address));
    }

    public function update($request , $id)
    {
        $address = $this->model->getAddressById($id);
        $address->update($request->all());
        return $this->success_response->response(new AddressResource($address));
    }

    public function  delete($id)
    {
        $address = $this->model->getAddressById($id);
        $address->delete();
        return $this->success_response->response(Constant::SUCCESS_RESPONSE);
    }
}
