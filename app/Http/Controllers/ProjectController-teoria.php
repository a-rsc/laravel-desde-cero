<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;

// Optimiza las imágenes con el paquete image.intervention.io


class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::orderBy('created_at', 'desc')->get();
        // $projects = Project::latest('created_at')->get();
        // $projects = Project::latest('created_at')->paginate(20);
        // $projects = DB::table('projects')->get();

        // return view('projects.index', compact('projects'));
        return view('projects.index', [
            'projects' => Project::latest('created_at')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Como se comparte el formulario en la vista create y edit, se debe pasar una instancia de proyecto vacío
        return view('projects.create', [
            'project' => new Project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // Sólo devuelve los campos validados
    //     $attributes = $request->validate([
    //         'title' => 'required|between:2,80|unique:projects,title',
    //         'description' => 'required|between:3,2048',
    //     ]);

    //     // return Project::create($request->all());

    //     // Project::create([
    //     //     'title' => $request->get('title'),
    //     //     'description' => $request->get('description'),
    //     // ]);
    //     Project::create($attributes);

    //     return redirect()->route('projects.index');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProjectRequest $request)
    {
        // return $request->file('image');
        // dd($request->file('image'));
        // return $request->file('image')->store('images', 'public'); // 2ndo parámetro donde se almacena el archivo (config.filesystems.php)

        // $project = Project::create($request->validated());

        // php artisan storage:link -h -> Create the symbolic links configured for the application
        // php artisan storage:link

        $project = new Project($request->validated());

        $project->image = $request->file('image')->store('images', 'public');
        $project->save();

        $image = Image::make(Storage::get($project->image))
        ->widen(600)
        ->limitColors(255)
        ->encode();

        Storage::put($project->image, (string) $image);

        return redirect()->route('projects.index')->with('status', __('El proyecto fue creado con éxito.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // Route Model Binding
        return view('projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SaveProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(SaveProjectRequest $request, Project $project)
    {
        // ddd(array_filter($request->validated()));

        if ($request->hasFile('image'))
        {
            Storage::delete($project->image);

            $project->fill($request->validated());

            $project->image = $request->file('image')->store('images', 'public');
            $project->save();

            $image = Image::make(Storage::get($project->image))
                ->widen(600)
                ->limitColors(255)
                ->encode();

            Storage::put($project->image, (string) $image);
        }
        else
        {
            $project->update(array_filter($request->validated()));
        }

        $project->update(array_filter($request->validated()));

        return redirect()->route('projects.show', $project)->with('status', __('El proyecto fue actualizado con éxito.'));;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Storage::delete($project->image);

        $project->delete();

        return redirect()->route('projects.index')->with('status', __('El proyecto fue eliminado con éxito.'));;
    }
}
