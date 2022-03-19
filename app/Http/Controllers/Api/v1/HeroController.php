<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Requests\HeroRequest;
use App\Http\Resources\v1\HeroResource;
use App\Http\Resources\v1\HeroCollection;
//uso de transacciones
use Illuminate\Support\Facades\DB;

class HeroController extends Controller
{  
    public function index()
    {
        return new HeroCollection(Hero::paginate(10));
    }
  
    public function store(HeroRequest $request)
    {
        DB::beginTransaction();
        try {
            $hero = Hero::create([
                'company_id' => $request->company_id,
                //'image' => '',
                'hero_name' => $request->hero_name,
                'actor_name' => $request->actor_name,
                'nation' => $request->nation
            ]);
            //formateamos los stats con sus levels, que vienen en el mismo orden

            if($request->skills){
                $hero->skills()->attach($request->skills);
            }

            if($request->stats){
                $array_stats = array();
                foreach($request->stats as $index => $item){
                    $array_stats[$item] = ['level' => $request->levels[$index]];
                }
                $hero->stats()->attach($array_stats);
            }
            //si todo va bien hacemos commit
            DB::commit();
            return response()->json([
                'message' => 'Héroe creado.',
                'result' => new HeroResource($hero)
            ], 201);
        } catch (\Throwable $th) {
            //si algo va mal hacemos rollback
            DB::rollBack();
            return response()->json([
                'message' => 'Héroe no se pudo crear.',
            ], 404);
        }        
    }
   
    public function show(Hero $hero)
    {
        return new HeroResource($hero);
    }
    
    public function update(HeroRequest $request, Hero $hero)
    {
        DB::beginTransaction();
        try {
            $hero->update([
                //'image' => '',
                'hero_name' => $request->hero_name,
                'actor_name' => $request->actor_name,
                'nation' => $request->nation,
                'company_id' => $request->company_id,
            ]);
            $hero->skills()->sync($request->skills);
            if($request->stats){
                $array_stats = array();
                foreach($request->stats as $index => $item){
                    $array_stats[$item] = ['level' => $request->levels[$index]];
                }
                $hero->stats()->sync($array_stats);
            }
            DB::commit();
            return response()->json([
                'message' => 'Héroe actualizado.',
                'result' => new HeroResource($hero)
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => 'Héroe no se pudo actualizar.',
            ], 404);
        }
    }
   
    public function destroy(Hero $hero)
    {
        DB::beginTransaction();
        try {
            $hero->stats()->sync([]);//elimino stats
            $hero->skills()->sync([]);//elimino stats
            $hero->delete();
            DB::commit();
            return response()->json([
                'message' => 'Héroe eliminado'
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => 'Héroe no se pudo eliminar.',
            ], 404);
        }        
    }
}
