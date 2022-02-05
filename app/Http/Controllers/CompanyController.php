<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

//Comando:
//php artisan make:controller CompanyController

class CompanyController extends Controller
{
    public function store(Request $request){
        //codigo para guardar
        Company::create([
            'description' => $request->description,
            'country' => $request->country
        ]);

        return 'Información registrada';
    }
}
