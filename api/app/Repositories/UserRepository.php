<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return User::class;
    }

    public function getLoggedUser($relations = [])
    {
        return $this->with($relations)->find(Auth::id());
    }

    public function getAllUsers($keyword = '', $page, $per_page = 10)
    {
        $query = $this->with(['role']);
        if ($keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%");
        }

        return $query->paginate($per_page);
    }
}
