<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'workers';
    protected $guarded = false;

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_workers', 'worker_id', 'project_id');
    }
}
