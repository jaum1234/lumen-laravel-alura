<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController
{
    protected string $classe;

    public function index(Request $request)
    {
        $recursos = $this->classe::paginate($request->per_page);
        return response()->json($recursos);

        /*
            Paginaçao

            $offset = ($request->page -1) * $request->per_page;

            return $this->classe::query()
                ->offset($offset)
                ->limit($request->per_page)
                ->get();
         */
    }

    public function store(Request $request)
    {
        return response()->json($this->classe::create($request->all()), 201);
    }

    public function show(Int $id)
    {
        $recursos = $this->classe::find($id);
        if (is_null($recursos)) {
            return response()->json('', 204); 
        }

        return response()->json($recursos);
    }

    public function update(Int $id, Request $request)
    {
        $recursos = $this->classe::find($id);
        if (is_null($recursos)) {
            return response()->json([
                'erro' => 'Recurso nao encontrado'
            ], 404);
        }
        $recursos->fill($request->all());
        $recursos->save();

        return response()->json($recursos);
    }

    public function destroy(Int $id)
    {
        /**
         *  O metodo destroy retorna a qtd de
         * recursos removidos
         */
        $qtdRecursosRemovidos = $this->classe::destroy($id);

        if ($qtdRecursosRemovidos === 0) {
            return response()->json(['erro' => 'Recurso nao encontrado'], 404);
        }

        return response()->json('', 204);
    }
}