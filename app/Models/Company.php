<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Comando:
//php artisan make:model Company

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'country'
    ];

    public $timestamps = false;

    //relaciones

    public function heroes(){//una compañia tiene muchos heroes
        return $this->hasMany(Hero::class);
    }
}
