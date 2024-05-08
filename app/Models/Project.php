<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'deadline',
        'summary',
        'member',
        'status',
        'completion_status',
        'category_id',
        'client_id',
    ];

    public function category(){
        return $this->belongsTo(ProjectCategory::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function memberData(){
        return $this->belongsTo(Employer::class ,'member');
    }

}
