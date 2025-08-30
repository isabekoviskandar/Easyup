<?php

namespace App\Responses;

use App\Models\Constant;

class SuccessResponse
{
    public function response($data , $message = Constant::SUCCESS_RESPONSE, $code = 200 , $headers = [] , $cookie = [] , $token = [])
    {
        if($cookie){
            return response()->json(['data' => $data, 'message' => $message , 'accept' => true , 'error' => null] , $code)->withHeaders($headers)->withCookie($cookie);
        }

        return response()->json(['data' => $data, 'message' => $message , 'accept' => true , 'error' => null] , $code)->withHeaders($headers);
    }
}
