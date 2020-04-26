<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    // dönüşüm tanımlarını alacağı resource dosyası.
    public $collects = 'App\Http\Resources\UserResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // this->collection ifadesi yukarda tanımlanan collects'den tanımlamaları çekecek.
            'data' => $this->collection,
            'meta' => [
                'total_users' => $this->collection->count(),
                'custom' => 'value'
            ]
        ];
    }
}
