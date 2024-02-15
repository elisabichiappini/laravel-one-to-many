<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Http\Request;
//importo modello type
use App\Models\Type;
//importo supporto 
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StoreTypeRequest $request)
    {
        //validazione
        $data = $request->validated();
        //creazione istanza
        $new_type = new Type();
        $new_type->title = $data['title'];
        $new_type->slug = Str::of($new_type->title)->slug('-');
        $new_type->save();
        //redirect
        return redirect()->route('admin.types.index')->with('message', "Categoria $new_type->id creata correttamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        //validazione
        $data = $request->validated();
        //creazione istanza
        $type->title = $data['title'];
        $type->slug = Str::of($type->title)->slug('-');
        $type->save();
        //redirect
        return redirect()->route('admin.types.index')->with('message', "Categoria $type->id modificata correttamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }
}
