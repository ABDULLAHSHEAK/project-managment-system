<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = [
        'shift_id',
        'name',
        'email',
        'phone',
        'address',
        'date',
        'weight',
        'height',
        'gender',
        'note',
        'img'
    ];

    function shift(): BelongsTo{
        return $this->belongsTo(Shift::class);
    }
}
