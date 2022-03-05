<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CompanyCollection extends ResourceCollection
{    
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'type' => 'companies',
            //'empresa' => 'Qusoft'
        ];
    }
}
