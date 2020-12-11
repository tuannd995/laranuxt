<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use Illuminate\Http\Response;

class AuthController extends BaseApiController
{
    public $authService;
    public $userRepository;

    public function __construct(
        AuthService $authService,
        UserRepository $userRepository
    ) {
        $this->authService = $authService;
        $this->userRepository = $userRepository;
    }

    public function login(LoginRequest $request)
    {
        if (!empty($request->errors)) {
            $errors = $request->errors->messages();
            return $this->sendError(__('auth.failed'), $errors, Response::HTTP_BAD_REQUEST);
        }
        $token = $this->authService->login($request);
        if ($token) {
            return $this->sendResponse(['token' => $token], __('auth.succeed'));
        }
        return $this->sendError(__('auth.failed'), [], Response::HTTP_FORBIDDEN);
    }

    public function logout()
    {
        auth()->logout();
        return $this->sendResponse(null, __('auth.logout_success'));
    }

    public function getUser()
    {
        $user = $this->userRepository->getLoggedUser(['role']);
        return $this->sendResponse(new UserResource($user), __('messages.search.success'));
    }
}
