<?php

namespace App\Http\Controllers\Admin\Worker;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerDeletedController extends Controller
{
    public function indexDeleted()
    {
        $workers = Worker::onlyTrashed()->paginate(10);

        return view('admin.worker.index_deleted', compact('workers'));
    }

    public function showDeleted($id)
    {
        $worker = Worker::onlyTrashed()->findOrFail($id);
        $positionForWorker = $worker->position;

        return view('admin.worker.show_deleted', compact('worker', 'positionForWorker'));
    }

    public function restoreDeleted($id)
    {
        $worker = Worker::onlyTrashed()->findOrFail($id);
        $worker->restore();

        return redirect()->route('workers.index.deleted');
    }
}
