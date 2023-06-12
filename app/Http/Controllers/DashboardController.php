<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(ProjectService $projectService)
    {
        $projects = $projectService->getAllByUserId();
        return view('dashboard', compact('projects'));
    }
}
