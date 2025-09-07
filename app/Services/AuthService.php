<?php

namespace App\Services;

use App\Models\User;
use App\Responses\ErrorResponse;
use App\Responses\SuccessResponse;

class AuthService extends Service{

    public function __construct(SuccessResponse $success_response , ErrorResponse $error_response , User $model)
    {
        $this->success_response = $success_response;
        $this->error_response = $error_response;
        $this->model = $model;
    }

    public function login($request)
    {
        
    }

    public function register()
    {

    }

    public function confirmOtp()
    {

    }
}