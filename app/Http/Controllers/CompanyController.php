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

        $validated = $request->validate([
            'description' => 'required|max:60',
            'country' => 'required|max:60',
        ],
        [
            'description.required' => 'La descripción no puede estar vacía.',
            'description.max' => 'La descripción sobrepasa el límite de caracteres.',
            'country.required' => 'El país no puede estar vacío.',
            'country.max' => 'El país sobrepasa el límite de caracteres.',
        ]);
        
        try {      
            $company = Company::create([
                'description' => $request->description,
                'country' => $request->country
            ]); 
            //dd($company);
            return response()->json([
                'message' => 'La compañia ha sido registrada correctamente.',
                'data' => $company
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Oopss, no se pudo registrar la información'                
            ], 500);
        }
    }
    
}
