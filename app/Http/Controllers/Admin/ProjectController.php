<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //get all technologies
        $technologies = Technology::all();

        return view('admin.projects.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //i dati devono superare la validazione
        $data = $request->validated();
        //istanzio la classe quando supero la validaizione e lo salvo
        $project = new Project();
        //massstore a mano
        $project->title = $data['title'];
        $project->tools = $data['tools'];
        $project->slug = Str::of($project->title)->slug('-');
        $project->description = $data['description'];
        $project->project_img = Storage::put('uploads', $data['project_img']);
        // $project->born = $data['born'];
        // $project->type = $data['type'];
        $project->save();

        //redirect alla lista progetti 
        return redirect()->route('admin.projects.index')->with('message', "Progetto $project->id creato correttamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //i dati inseriti devono superare la validazione
        $data = $request->validated();
        //campo fatto a mano
        $project->slug = Str::of($data['title'])->slug('-');
        //competenza di laravel di salvare i dati
        $project->update($data);
        //redirect alla lista 
        return redirect()->route('admin.projects.index')->with('message', "Progetto $project->id aggiornato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {   
        if($project->project_img) {
            Storage::delete('project_img');
        }
        //salvo in variabile il valore id del progetto
        $project_id = $project->id;
        //cancello il post che passo con la dependency injection
        $project->delete();
        //redirect alla lista progetti index e mostra messaggio se l'azione è andata a buon fine
        return redirect()->route('admin.projects.index')->with('message', "Progetto $project_id cancellato correttamente");
    }
}
