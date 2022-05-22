<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Http\Resources\InventarioResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Inventario\InventarioStoreRequest;
use App\Http\Requests\Inventario\InventarioUpdateRequest;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'inventario' => InventarioResource::collection(
                Cache::remember('inventario', 86400, function(){
                    return Inventario::all();
                })
            ),
            'message' => 'Retrieved Successfully'
        ], 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventarioStoreRequest $request)
    {
        $validated = $request->validated();

        $inventario = Inventario::create($validated);

        return response([
            'inventario' => new InventarioResource($inventario),
            'message' => 'Created Successfully'
        ], 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        return response([
            'data' => new InventarioResource($inventario),
            'message' => 'Retrieved Successfully'
        ], 200 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CInventario $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(InventarioUpdateRequest $request, Inventario $inventario)
    {
        $inventario->update($request->all());

        return response([
            'inventario' => new InventarioResource($inventario),
            'message' => 'Retrieved Successfully'
        ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return response (['message' => 'Deleted Successfully'], 200);
    }
}
