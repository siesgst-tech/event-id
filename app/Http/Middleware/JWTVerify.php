<?php

namespace App\Http\Middleware;

use JWTAuth;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Closure;

class JWTVerify
{
    /**
    * Sends JSON response
    * @param status_code:HTTP_STATUS_CODE, status_type:success,fail, message
    */
    private function send_response($status_code, $status_type, $message, $token = NULL)
    {
        return Response::json(
            $data = array('status' => $status_type, 'message' => $message),
            $status = $status_code,
            $headers = ['Content-Type' => 'application/json'],
            $options = JSON_PRETTY_PRINT);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = JWTAuth::getToken();
        $response = $next($request);
        if (! $token) {
            return $this->send_response(401, 'fail', 'Authentication credentials were missing or incorrect');
        }
        try {
            if (! $user = JWTAuth::authenticate($token)) {
                return $this->send_response(404, 'fail', 'Authentication credentials were missing or incorrect');
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            try {
                $token = JWTAuth::refresh($token);
                $response->headers->set('Authentication', 'Bearer '.$token);
            } catch (Exception $e) {
                return $this->send_response(401, 'fail', $e->getMessage());
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return $this->send_response($e->getStatusCode(), 'fail', 'Token is invalid');
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return $this->send_response($e->getStatusCode(), 'fail', 'Authentication credentials were missing or incorrect');
        }
        return $response;
    }
}
