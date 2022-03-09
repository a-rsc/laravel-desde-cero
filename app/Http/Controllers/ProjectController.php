<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Events\ProjectSaved;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;
use App\Models\Category;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        return view('projects.index', [
            'projects' => Project::with('category')->latest('created_at')->paginate(5)
        ]);
    }

    public function show(Project $project)
    {
        // Route Model Binding
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function create()
    {

        return view('projects.create', [
            'project' => new Project,
            'categories' => Category::pluck('category', 'id')
        ]);
    }

    public function store(SaveProjectRequest $request)
    {
        $project = new Project($request->validated());

        $project->image = $request->file('image')->store('images', 'public');
        $project->save();

        // Events and listeners
        ProjectSaved::dispatch($project);

        return redirect()->route('projects.index')->with('status', __('El proyecto fue creado con éxito.'));
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
            'project' => $project,
            'categories' => Category::pluck('category', 'id')
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

            // Events and listeners
            ProjectSaved::dispatch($project);
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
