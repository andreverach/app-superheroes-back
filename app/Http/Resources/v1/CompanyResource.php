<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{    
    public function toArray($request)
    {
        return [     
            //'codigo' => $this->id,       
            'nombre' => $this->description,
            'pais' => $this->country
        ];
    }
}
