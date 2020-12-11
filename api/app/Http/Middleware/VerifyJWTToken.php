<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException as ExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException as InvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class VerifyJWTToken extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            if ($e instanceof ExpiredException) {
                return response()->json([
                    'success' => false,
                    'message' => $e
                ], Response::HTTP_UNAUTHORIZED);
            } elseif ($e instanceof InvalidException) {
                return response()->json([
                    'success' => false,
                    'message' => __('messages.token.invalid')
                ], Response::HTTP_UNAUTHORIZED);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => __('messages.token.required')
                ], Response::HTTP_UNAUTHORIZED);
            }
        }
        return $next($request);
    }
}
