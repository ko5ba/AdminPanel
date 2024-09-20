<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'projects';
    protected $guarded = [];

    public function workers()
    {
        return $this->belongsToMany(Worker::class, 'project_workers', 'project_id', 'worker_id');
    }
}
