<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::where('user_id', auth()->id())->orderByDesc('id')->get();
        $types = Type::all();
        $users = User::all();

        return view('admin.projects.index', compact('projects', 'types', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $validated = $request->validated();

        $validated['slug'] = Str::slug($request->title, '-');

        if ($request->has('cover_image')) {

            $image_path = Storage::put('uploads', $request->cover_image);

            $validated['cover_image'] = $image_path;
        }

        $project = new Project();

        $project->fill($validated);
        $project->save();

        return to_route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $types = Type::all();
        $users = User::all();

        return view('admin.projects.show', compact('project', 'users', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        if (auth()->id() != $project->user_id) {
            abort(403, 'You can edit your projects only.');
        }

        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        if (auth()->id() != $project->user_id) {
            abort(403, 'You can edit your projects only.');
        }
        
        $validated = $request->validated();
        //dd($request->validated()['type_id']);
        

        if ($request->has('cover_image')) {

            if ($project->cover_image) {

                Storage::delete($project->cover_image);
            }

            $image_path = Storage::put('uploads', $request->cover_image);

            $validated['cover_image'] = $image_path;
        }

        
        $project->update($validated);
        
        return to_route('admin.projects.show', $project)->with('message', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage. 
     */
    public function destroy(Project $project)
    {

        if (auth()->id() != $project->user_id) {
            abort(403, 'You can delete your projects only.');
        }

        if ($project->cover_image && !Str::startsWith($project->cover_image, 'https://')) {

            Storage::delete($project->cover_image);
        }

        $project->delete();
        return to_route('admin.projects.index', $project)->with('message', 'Post deleted successfully');
    }
}
