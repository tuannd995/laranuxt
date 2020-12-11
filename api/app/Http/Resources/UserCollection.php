<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => UserResource::collection($this->collection),
            'pagination' => [
                'size' => (int)$this->perPage(),
                'total' => (int)$this->total(),
                'current' => (int)$this->currentPage(),
                'last' => (int)$this->lastPage(),
                'base' => $this->url(1),
                'next' => $this->nextPageUrl(),
                'prev' => $this->previousPageUrl()
            ],
        ];
    }
}
