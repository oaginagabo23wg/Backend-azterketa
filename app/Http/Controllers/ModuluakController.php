<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateModuluakRequest;
use App\Http\Requests\StoreModuluakRequest;
use App\Models\Moduluak;

class ModuluakController extends Controller
{
    public function index()
    {
        //return Moduluak::all();
        return Moduluak::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModuluakRequest $request)
    {
        $request->validate([
            'izena' => 'required:max:255',
            'gela' => 'required|date'
        ]);

        // var_dump($request->all());

        Moduluak::create($request->all());
        return ['message' => 'ondo'];

    }

    /**
     * Display the specified resource.
     */
    public function show(Moduluak $modulua)
    {
        //return $modulua;
        return ['modulua' => $modulua, 'user' => $modulua->user];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModuluakRequest $request, Moduluak $modulua)
    {
        $fields = $request->validate([
            'title' => 'required:max:255',
            'body' => 'required'
        ]);

        $modulua->update($fields);

        //return $modulua;
        return ['modulua' => $modulua, 'user' => $modulua->user];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moduluak $modulua)
    {
        $modulua->delete();

        return ['message' => 'The modulua was deleted'];
    }
}
