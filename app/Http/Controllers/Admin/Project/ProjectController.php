<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\StoreRequest;
use App\Models\Project;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $projects = Project::paginate(10);

        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Worker $worker)
    {
        $workers = Worker::all();

        return view('admin.project.create', compact('workers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->create();

        return redirect()->route('admin.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $timeDeadline = Carbon::parse($project->time_deadline)->format('H:i');
        return view('admin.project.show', compact('project', 'timeDeadline'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
