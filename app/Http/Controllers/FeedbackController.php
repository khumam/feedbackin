<?php

namespace App\Http\Controllers;

use App\Models\FeedbackForm;
use App\Models\Project;

class FeedbackController extends Controller
{
    public function preview(Project $project)
    {
        $feedbackForm = FeedbackForm::where('project_id', $project->id)->where('user_id', Auth()->id())->first();
        return $feedbackForm->user_id === Auth()->id() ? view('feedback.preview', compact('feedbackForm', 'project')) : abort(404);
    }
}
