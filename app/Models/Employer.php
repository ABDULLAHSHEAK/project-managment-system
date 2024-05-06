<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'note',
        'category_id',
        'img'
    ];

    function employerCategory(){
        return $this->belongsTo(EmployerCategory::class , 'category_id');
    }
}
