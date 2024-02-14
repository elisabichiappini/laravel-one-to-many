<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $data = $request->validated();
        //controllo dei dati inviati che hanno superato la validazione
        // dd($data);
        $new_technology = new Technology();
        $new_technology->title = $data['title'];
        $new_technology->slug = Str::of($new_technology->title)->slug('-');
        $new_technology->save(); 
        
        return redirect()->route('admin.technologies.index')->with('message', "Tecnologia $new_technology->id caricata con successo");
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        //cancelliamo le relazioni
        $technology->projects()->detach();
        //salviamo id tecnologia prima di cancellarla
        $technology_id = $technology->id;
        //cancellare la tecnologia
        $technology->delete();
        //reindirizzare alla pagina index con il messaggio relativo
        return redirect()->route('admin.technologies.index')->with('message', "Tecnologia $technology_id cancellata con successo");
    }
}
