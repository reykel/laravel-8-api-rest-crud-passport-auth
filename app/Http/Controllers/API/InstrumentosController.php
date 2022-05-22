<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Instrumento;
use Illuminate\Http\Request;
use App\Http\Resources\InstrumentoResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Instrumento\InstrumentoStoreRequest;
use App\Http\Requests\Instrumento\InstrumentoUpdateRequest;

class InstrumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'instrumentos' => InstrumentoResource::collection(
                Cache::remember('instrumentos', 86400, function(){
                    return Instrumento::all();
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
    public function store(InstrumentoStoreRequest $request)
    {
        $validated = $request->validated();

        $instrumento = Instrumento::create($validated);

        return response([
            'instrumento' => new InstrumentoResource($instrumento),
            'message' => 'Created Successfully'
        ], 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instrumento $instrumento
     * @return \Illuminate\Http\Response
     */
    public function show(Instrumento $instrumento)
    {
        return response([
            'data' => new InstrumentoResource($instrumento),
            'message' => 'Retrieved Successfully'
        ], 200 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CInstrumento $instrumento
     * @return \Illuminate\Http\Response
     */
    public function update(InstrumentoUpdateRequest $request, Instrumento $instrumento)
    {
        $instrumento->update($request->all());

        return response([
            'instrumento' => new InstrumentoResource($instrumento),
            'message' => 'Retrieved Successfully'
        ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instrumento  $instrumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrumento $instrumento)
    {
        $instrumento->delete();
        return response (['message' => 'Deleted Successfully'], 200);
    }
}
