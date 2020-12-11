<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Resources\UserCollection;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    public $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $users = $this->userRepository->getAllUsers(
            $request->get('keyword', ''),
            $request->get('page, 1'),
            $request->get('per_page', 10)
        );
        return $this->sendResponse(new UserCollection($users), __('messages.search.success'));
    }
}
