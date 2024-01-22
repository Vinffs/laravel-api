<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $formData = $request->validated();

        $slug = Project::getSlug($formData['title']);

        $formData['slug'] = $slug;

        $userId = Auth::id();

        $formData['user_id'] = $userId;

        if ($request->hasFile('thumb')) {
            $thumb_path = Storage::put('uploads', $formData['thumb']);
            $formData['thumb'] = $thumb_path;
        }
        $newProject = Project::create($formData);

        if ($request->has('technologies')) {
            $newProject->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.show', $newProject->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $currentUserId = Auth::id();
        if ($currentUserId == $project->user_id || $currentUserId == 1) {
            return view('admin.projects.show', compact('project'));
        }
        abort(403);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        $currentUserId = Auth::id();
        if ($currentUserId != $project->user_id && $currentUserId != 1) {
            abort(403);
        }
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $currentUserId = Auth::id();
        if ($currentUserId != $project->user_id && $currentUserId != 1) {
            abort(403);
        }
        $formData = $request->validated();

        $formData['slug'] = $project->slug;
        if ($project->title !== $formData['title']) {
            //CREATE SLUG
            $slug = Project::getSlug($formData['title']);
            $formData['slug'] = $slug;
        }

        $formData['user_id'] = $project->user_id;

        if ($request->hasFile('thumb')) {
            if (Storage::exists($project->thumb)) {
                Storage::delete($project->thumb);
            }
        }
        $thumb_path = Storage::put('uploads', $formData['thumb']);
        $formData['thumb'] = $thumb_path;
        $project->update($formData);
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach();
        }
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $currentUserId = Auth::id();
        if ($currentUserId != $project->user_id && $currentUserId != 1) {
            abort(403);
        }
        if ($project->thumb) {
            Storage::delete($project->thumb);
        }
        $project->$project->delete();
        return to_route('admin.projects.index')->with('message', "Project {{$project->title}} deleted successfully");
    }
}
