<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'image',
        'hero_name',
        'actor_name',
        'nation',
    ];

    public $timestamps = false;

    //relaciones
    public function company(){//1 o más heroes pertenece a 1 compañia
        return $this->belongsTo(Company::class);
    }
    
}