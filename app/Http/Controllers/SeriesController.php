<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;


class SeriesController
{
    public function index()
    {
        $series = Serie::all();
        return response()->json($series);
    }

    public function store(Request $request)
    {
        return response()->json(Serie::create($request->all()), 201);
    }

    public function show(Int $id)
    {
        $serie = Serie::find($id);
        if (is_null($serie)) {
            return response()->json('', 204); 
        }

        return response()->json($serie);
    }

    public function update(Int $id, Request $request)
    {
        $serie = Serie::find($id);
        if (is_null($serie)) {
            return response()->json([
                'erro' => 'Recurso nao encontrado'
            ], 404);
        }
        $serie->fill($request->all());
        $serie->save();

        return response()->json($serie);
    }

    public function destroy(Int $id)
    {
        /**
         *  O metodo destroy retorna a qtd de
         * recursos removidos
         */
        $qtdRecursosRemovidos = Serie::destroy($id);

        if ($qtdRecursosRemovidos === 0) {
            return response()->json(['erro' => 'Recurso nao encontrado'], 404);
        }

        return response()->json('', 204);
    }
}