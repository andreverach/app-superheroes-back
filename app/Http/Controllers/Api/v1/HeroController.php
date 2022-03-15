<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Requests\HeroRequest;
use App\Http\Resources\v1\HeroResource;
use App\Http\Resources\v1\HeroCollection;


class HeroController extends Controller
{  
    public function index()
    {
        return new HeroCollection(Hero::paginate(10));
    }
  
    public function store(HeroRequest $request)
    {
        $hero = Hero::create([
            'company_id' => $request->company_id,
            //'image' => '',
            'hero_name' => $request->hero_name,
            'actor_name' => $request->actor_name,
            'nation' => $request->nation
        ]); 

        return response()->json([
            'message' => 'Héroe creado.',
            'result' => new HeroResource($hero)
        ], 201);
    }
   
    public function show(Hero $hero)
    {
        return new HeroResource($hero);
    }
    
    public function update(HeroRequest $request, Hero $hero)
    {
        $hero->update([
            //'image' => '',
            'hero_name' => $request->hero_name,
            'actor_name' => $request->actor_name,
            'nation' => $request->nation,
            'company_id' => $request->company_id,
        ]);

        return response()->json([
            'message' => 'Héroe actualizado.',
            'result' => new HeroResource($hero)
        ], 200);
    }
   
    public function destroy(Hero $hero)
    {
        $hero->delete();
        return response()->json([
            'message' => 'Héroe eliminado'
        ], 200);
    }
}
