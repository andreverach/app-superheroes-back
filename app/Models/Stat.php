<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];

    public $timestamps = false;

    //Relacion muchos a muchos
    public function heroes(){
        return $this->belongsToMany(Hero::class);                    
    }
}
