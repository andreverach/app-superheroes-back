<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;

//Comando:
//php artisan make:controller CompanyController

class CompanyController extends Controller
{
    public function store(CompanyRequest $request){
        try {
            $company = Company::create([
                'description' => $request->description,
                'country' => $request->country
            ]);
            return response()->json([
                'message' => 'La compañia ha sido registrada correctamente.',
                'data' => $company
            ], 201);//Created
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Oopss, no se pudo registrar la información'                
            ], 500);//Error server
        }
    }

    //funcion para mostrar
    public function show(Request $request){
        $company = Company::where('id', $request->id)->first();
        if($company){
            return response()->json([
                'data' => $company
            ], 200);//OK
        }else{
            return response()->json([
                'message' => 'Información no encontrada.'                
            ], 404);//Not found            
        }
    }

    
}
