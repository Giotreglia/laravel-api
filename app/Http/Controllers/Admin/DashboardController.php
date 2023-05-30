<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ProjectController;

class DashboardController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('admin.dashboard', compact('projects'));
    }
}
