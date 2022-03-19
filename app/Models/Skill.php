<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];

    public $timestamps = false;

    public function heroes(){
        return $this->belongsToMany(Hero::class);                    
    }

}
