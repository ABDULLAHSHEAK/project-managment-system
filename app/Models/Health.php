<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Health extends Model
{
    use HasFactory;
    protected $fillable = ['bp','diabetes','weight','height','blood','date','member_id'];

    function member():BelongsTo{
        return $this->belongsTo(Member::class, 'member_id');
    }
}
