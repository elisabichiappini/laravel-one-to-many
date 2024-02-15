<?php
//cambiato namespace con riferimento al folder Admin
namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
// importo classe Technology
use App\Models\Technology;
// importo classe Controller
use App\Http\Controllers\Controller;
//importo 
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
        //validazione
        $data = $request->validated();
        //creazione istanza
        $new_technology = new Technology();
        $new_technology->title = $data['title'];
        $new_technology->slug = Str::of($new_technology->title)->slug('-');
        $new_technology->save();
        //redirect
        return redirect()->route('admin.technologies.index')->with('message', "Tecnologia $new_technology->id creato correttamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        //validazione
        $data = $request->validated();
        //creazione istanza
        $technology->title = $data['title'];
        $technology->slug = Str::of($technology->title)->slug('-');
        $technology->save();
        //redirect
        return redirect()->route('admin.technologies.index')->with('message', "Tecnologia $technology->id modificata correttamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology_id = $technology->id;
        $technology->delete();
        return redirect()->route('admin.technologies.index', $technology)->with('message', "Tecnologia $technology_id eliminata correttamente");
    }
}
