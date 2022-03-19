<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

use App\Http\Requests\StatRequest;
use App\Http\Resources\v1\StatResource;
use App\Http\Resources\v1\StatCollection;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new StatCollection(Stat::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatRequest $request)
    {
        $stat = Stat::create($request->all());
        //dd($request->all());
        return response()->json([
            'message' => 'Stat creado.',
            'result' => $stat
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function show(Stat $stat)
    {
        return new StatResource($stat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function update(StatRequest $request, Stat $stat)
    {
        $stat->update($request->all());
        return response()->json([
            'message' => 'Stat actualizado.',
            'result' => $stat
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stat $stat)
    {
        $stat->delete();
        return response()->json([
            'message' => 'Stat eliminado'
        ], 200);
    }
}
