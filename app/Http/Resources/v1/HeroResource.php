<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class HeroResource extends JsonResource
{    
    public function toArray($request)
    {
        return [
            //'id' => $this->id,
            'name' => $this->hero_name,
            'actor' => $this->actor_name,
            'image' => $this->image,
            'nation' => $this->nation,
            'company' => [
                'description' => $this->company->description,
                'country' => $this->company->country                
            ]
        ];
    }
}
