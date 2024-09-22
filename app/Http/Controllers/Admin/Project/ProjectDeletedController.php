<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectDeletedController extends Controller
{
    public function indexDeleted()
    {
        $projects = Project::onlyTrashed()->paginate(10);

        return view('admin.project.index_deleted', compact('projects'));
    }

    public function showDeleted($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $timeDeadline = Carbon::parse($project->time_deadline)->format('H:i');

        return view('admin.project.show_deleted', compact('project', 'timeDeadline'));
    }

    public function restoreDeleted($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();

        return redirect()->route('projects.index.deleted');
    }
}
