<?php

namespace App\Http\Controllers\Admin\Position;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionDeletedController extends Controller
{
    public function indexDeleted()
    {
        $positions = Position::onlyTrashed(10)->paginate();

        return view('admin.position.index_deleted', compact('positions'));
    }

    public function showDeleted($id)
    {
        $position = Position::onlyTrashed()->findOrFail($id);

        return view('admin.position.show_deleted', compact('position'));
    }

    public function restoreDeleted($id)
    {
        $position = Position::onlyTrashed()->findOrFail($id);
        $position->restore();

        return redirect()->route('positions.index.deleted');
    }
}
