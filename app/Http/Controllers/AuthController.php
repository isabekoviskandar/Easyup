<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Easyup API Documentation",
 *     description="This is the API documentation for Easyup built with Laravel 11 and L5-Swagger"
 * )
 */

class AuthController extends Controller
{
    public function __construct(AuthService $service)
    {
        return $this->service = $service;
    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Login user",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="secret123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful login",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="token", type="string", example="Bearer eyJ0eXAiOiJKV...")
     *         )
     *     )
     * )
     */
    public function login(LoginRequest $request)
    {
        return $this->service->login($request);
    }



    public function register()
    {
        return $this->service->register();
    }

    public function confirmOtp()
    {
        return $this->service->confirmOtp();
    }
}
