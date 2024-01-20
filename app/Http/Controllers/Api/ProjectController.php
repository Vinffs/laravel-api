<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(3);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($id)
    {
        $project = Project::find($id);
        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}