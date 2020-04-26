<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            // belirli bir şarta bağlı gösterilecek kolon. burada şart id ye göe değil tabiki ek bir kolona göre olabilir.
            // id 1'ise 1 diye bir değer gönder demiş oldu.
            'is_admin' => $this->when($this->id == 1,1)
        ];
    }
}
