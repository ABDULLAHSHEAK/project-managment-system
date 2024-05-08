<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'deadline',
        'summary',
        'status',
        'completion_status',
        'employer_id',
        'project_id',
        'file'
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
