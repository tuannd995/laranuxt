<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => null,
        ];
        if ($this->relationLoaded('role')) {
            $data['role'] = $this->role;
        }
        return $data;
    }
}