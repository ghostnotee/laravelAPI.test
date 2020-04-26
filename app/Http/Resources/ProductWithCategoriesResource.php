<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductWithCategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // whenLoaded categories tablosu yüklendiyse bu kolonu göster.
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            //'categories'=> CategoryResource::collection($this->categories),

        ];
    }
}
