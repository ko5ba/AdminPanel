<?php

namespace App\Http\Controllers\Admin\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Worker\StoreRequest;
use App\Http\Requests\Admin\Worker\UpdateRequest;
use App\Models\Position;
use App\Models\Worker;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::paginate(10);

        return view('admin.worker.index', compact('workers'));
    }

    public function create()
    {
        $positions = Position::all();

        return view('admin.worker.create', compact('positions'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Worker $worker)
    {
        $data = $request->validated();
        $worker->create($data);

        return redirect()->route('workers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker, Position $position)
    {
        $positionForWorker = $worker->position->title;

        return view('admin.worker.show', compact('worker', 'positionForWorker'));
    }

    public function edit(Worker $worker, Position $position)
    {
        $positions = Position::all();

        return view('admin.worker.edit', compact('worker', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Worker $worker)
    {
        $worker->update($request->validated());

        return redirect()->route('workers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();

        return redirect()->route('workers.index');
    }
}
