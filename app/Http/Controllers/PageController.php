<?php

namespace App\Http\Controllers;
use App\Models\Project;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('welcome', compact('projects'));
    }
}
