<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // public $table = 'notes';
    protected $fillable = ['note', 'file','project_id'];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
