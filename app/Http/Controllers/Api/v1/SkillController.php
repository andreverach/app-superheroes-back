<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

use App\Http\Resources\v1\SkillResource;
use App\Http\Resources\v1\SkillCollection;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SkillCollection(Skill::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $skill = Skill::create($request->all());
        return response()->json([
            'message' => 'Habilidad creada.',
            'result' => $skill
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {        
        return new SkillResource($skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $skill->update($request->all());
        return response()->json([
            'message' => 'Habilidad actualizada',
            'result' => $skill
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json([
            'message' => 'Habilidad eliminada'
        ], 200);
    }
}
