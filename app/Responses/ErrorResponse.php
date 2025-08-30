<?php

namespace App\Responses;
use App\Models\Constant;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class ErrorResponse
{
    protected bool $has_logged = false;

    public function response($message = Constant::ERROR_RESPONSE, $error = null, $code = 400, $headers = [], $cookie = null)
    {
        $this->logIfNeeded($error);

        $response = response()->json([
            'message' => $message,
            'error' => env('APP_DEBUG') ? $error?->getMessage() : null
        ], $code)->withHeaders($headers);

        if ($cookie) {
            return $response->withoutCookie($cookie);
        }

        return $response;
    }

    public function responseException($message = Constant::ERROR_RESPONSE, $error = null, $code = 400, $headers = [], $cookie = null)
    {
        $this->logIfNeeded($error);

        $response = response()->json([
            'message' => $message,
            'error' => env('APP_DEBUG') ? $error?->getMessage() : null
        ], $code)->withHeaders($headers);

        if ($cookie) {
            $response = $response->withCookie($cookie);
        }

        throw new HttpResponseException($response);
    }

    protected function logIfNeeded($error)
    {
        if (!$error || $this->has_logged) {
            return;
        }

        $logMessage = $this->getDefaultLogMessage($error);
        Log::channel(env('LOG_TELEGRAM_CHANNEL'))->error($logMessage);
        $this->has_logged = true;
    }

    protected function getDefaultLogMessage($error): string
    {
        $message = "\nRoute: " . Route::getFacadeRoot()?->current()?->uri();
        $message .= "\nMessage: " . $error->getMessage() . "\nError:\n";

        $errors = explode('#', $error);
        $i = 1;
        foreach ($errors as $err) {
            if (!str_contains($err, Pipeline::class) && !str_contains($err, 'Illuminate\Foundation')) {
                $index = strpos($err, 'app');
                if ($index !== false) {
                    $err = substr($err, $index);
                    $message .= "$i. $err\n";
                    $i++;
                }
            }
        }

        return $message;
    }
}
