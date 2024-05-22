<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        
        $val_data = $request->validate([
            'title' => 'required|max:100',
            'languages_and_frameworks' => 'required|max:100',
            'slug' => 'required',
        ]);

        $project = new Project();

        $project->fill($val_data);
        $project->save();

        return to_route('projects.index');

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
        
        $project->update($request->all());

        return to_route('admin.projects.show', $project)->with('message', 'Post updated successfully');

    }

    /**
     * Remove the specified resource from storage. 
     */
    public function destroy(Project $project)
    {
        //dd($project);
        $project->delete();
        return to_route('admin.projects.index', $project)->with('message', 'Post deleted successfully');

    }
}
