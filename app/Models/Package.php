<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'duration',
        'description',
        'services_include',
        'benefit',
        'status',
        'trainer_id',
    ];

    function trainer():BelongsTo{
        return $this->belongsTo(Trainer::class);
    }
}
