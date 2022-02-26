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
        //aqui
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

    //funcion para mostrar un registro
    public function show(Company $company){
        return response()->json([            
            'company' => $company
        ], 200);//OK
    }

    //mostrar todos los registros
    public function index(){
        $companies = Company::get();
        return response()->json([            
            'companies' => $companies
        ], 200);//OK
    }

    //actualizar un registro
    public function update(CompanyRequest $request, Company $company){
        //$company = updateOrCreate([]);
        $company->update([
            'description' => $request->description,
            'country' => $request->country
        ]);
        return response()->json([
            'message' => 'Registro actualizado.',
            'company' => $company
        ], 200);//OK
    }

    public function destroy(Company $company){
        //$company = Company::find($company);
        $company->delete();
        return response()->json([
            'message' => 'Registro eliminado.'
        ], 200);//OK
    }

}
