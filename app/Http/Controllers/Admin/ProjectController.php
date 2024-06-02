<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Support\Str;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $projects = Project::orderByDesc('id')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Str::of($request->title)->slug('-');


        if ($request->has('cover_image')) {
            $val_data['cover_image'] = Storage::put('uploads', $request->cover_image);
        };

        $projects = Project::create($val_data);
        if ($request->has('technologies')) {
            $projects->technologies()->attach($val_data['technologies']);
        }

        return to_route('admin.projects.index')->with('message', 'Post created miracolously😄');
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
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Str::of($request->title)->slug('-');


        if ($request->has('cover_image')) {
            $val_data['cover_image'] = Storage::put('uploads', $request->cover_image);
        };

        $project->update($val_data);

        /*  dd($val_data['technologies']); */

        if ($request->has('technologies')) {
            $project->technologies()->sync($val_data['technologies']);
        }

        return to_route('admin.projects.index')->with('message', 'Post created miracolously😄');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        /* Nb: non serve fare sync o detach sulla technology perchè abbiamo usato cascadeOnDelete */

        if ($project->cover_image) {
            Storage::delete($project->cover_image);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Project definitively removed');
    }
}
