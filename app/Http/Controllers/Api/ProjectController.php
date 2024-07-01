<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        
        $projects = Project::with(['type', 'technologies'])->paginate(6);

        $data = [
            'results' => $projects,
            'success' => true,
        ];

        return response()->json($data);
    }
}
