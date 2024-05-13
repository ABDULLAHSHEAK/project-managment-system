<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'member_id',
    ];
    public function project(){
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function memberProject()
    {
        return $this->belongsTo(Employer::class, 'member_id', 'id');
    }

}