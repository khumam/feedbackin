<?php

namespace App\Services;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\FeedbackForm;
use App\Models\Project;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectService
{
    /**
     * Get the specific project by user id
     *
     * @return void
     */
    public function getAllByUserId()
    {
        return Project::where('user_id', Auth()->id())->latest()->get();
    }

    /**
     * Store the project data from request
     *
     * @param  mixed $request
     * @return void
     */
    public function store(StoreProjectRequest $request)
    {
        DB::beginTransaction();
        try {
            $project = Project::create([
                'user_id' => Auth()->id(),
                'name' => $request->name,
                'main_url' => $request->main_url,
                'redirect_url' => $request->redirect_url,
                'desc' => $request->desc,
                'status' => 'published'
            ]);
            $config = [
                ['id' => Str::random(10), 'enable' => true, 'label' => "Customer's name", 'placeholder' => 'Hannah A', 'type' => 'text'],
                ['id' => Str::random(10), 'enable' => true, 'label' => "Customer's email", 'placeholder' => 'hannah@feedbackin.com', 'type' => 'email'],
                ['id' => Str::random(10), 'enable' => true, 'label' => "Your ratings", 'type' => 'ratings'],
            ];
            FeedbackForm::create([
                'user_id' => Auth()->id(),
                'project_id' => $project->id,
                'config' => json_encode($config)
            ]);
            DB::commit();
            return $project;
        } catch (Exception $err) {
            DB::rollBack();
            dd($err);
        }
    }

    /**
     * Update the project data from request
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return void
     */
    public function update(string $id, UpdateProjectRequest $request)
    {
        return Project::where('id', $id)->update([
            'name' => $request->name,
            'main_url' => $request->main_url,
            'redirect_url' => $request->redirect_url,
            'desc' => $request->desc,
        ]);
    }

    /**
     * Destroy the specific data from project by id
     *
     * @param  mixed $project
     * @return void
     */
    public function destroy(Project $project)
    {
        return Project::where('id', $project->id)->delete();
    }
}
