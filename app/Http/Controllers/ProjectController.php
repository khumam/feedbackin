<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request, ProjectService $projectService)
    {
        $act = $projectService->store($request);
        return ($act) ? redirect()->route('project.show', $act->id) : back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, ProjectService $projectService)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project, ProjectService $projectService)
    {
        $act = $projectService->update($project->id, $request);
        return ($act) ? redirect()->route('project.show', $project) : back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, ProjectService $projectService)
    {
        $act = $projectService->destroy($project);
        return ($act) ? redirect()->route('dashboard') : back();
    }
}
