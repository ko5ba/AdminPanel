<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Worker;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __invoke()
    {
        $workers = Worker::all();
        $positions = Position::all();

        return view('admin.main.index', compact('workers', 'positions'));
    }
}
