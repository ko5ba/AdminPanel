<?php

namespace App\Http\Controllers\Admin\Position;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Position\StoreRequest;
use App\Http\Requests\Admin\Position\UpdateRequest;
use App\Models\Position;

class PositionContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::paginate(10);

        return view('admin.position.index', compact('positions'));
    }

    public function create()
    {
        return view('admin.position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Position $position)
    {
        $data =$request->validated();
        Position::firstOrCreate($data);

        return redirect()->route('positions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        return view('admin.position.show', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Position $position)
    {
        $position->update($request->validated());

        return redirect()->route('positions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('positions.index');
    }
}
