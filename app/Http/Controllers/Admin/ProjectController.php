<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $newProject = new Project();
        $newProject->title = $form_data['title'];
        $newProject->description = $form_data['description'];
        $newProject->image = $form_data['image'];
        $newProject->client = $form_data['client'];
        $newProject->type_id = $form_data['type_id'];
        $newProject->slug = Str::slug($form_data['title'], '-');
        $newProject->save();

        $newProject->slug = $newProject->slug . '-' . $newProject->id;


        if ($request->has('technologies')) {
            $newProject->technologies()->attach($request->technologies);
        }


        if ($request->hasFile('image')) {
            $path = Storage::put('cover', $request->image);
            $newProject->image = $path;
        }

        $newProject->save();


        return redirect()->route('admin.projects.show', ['project' => $newProject->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $technologies = Technology::all();
        return view('projects.show', compact('project', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $projects = Project::all();
        $technologies = Technology::all();
        $types = Type::all();
        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();



        if ($request->hasFile('image')) {

            if ($project->image) {
                Storage::delete($project->image);
            }

            $path = Storage::put('cover', $request->image);
            $form_data['image'] = $path;

        }
        $project->technologies()->sync($request->technologies);
        $project->update($form_data);

        return redirect()->route('admin.projects.show', ['project' => $project->slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
