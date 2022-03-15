<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HeroCollection extends ResourceCollection
{    
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'type' => 'heroes'  
          ];
    }
}
