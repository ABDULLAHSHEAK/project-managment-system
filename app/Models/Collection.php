<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = ['collect', 'project_id','date'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
