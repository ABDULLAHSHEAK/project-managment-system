<?php

namespace App\Models;

use App\Models\Shift;
use App\Models\Health;
use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'address','join_date','age', 'note','status', 'img','package_id', 'shift_id'];

    function package():BelongsTo{
        return $this->belongsTo(Package::class);
    }
    function shift():BelongsTo{
        return $this->belongsTo(Shift::class);
    }
    public function health()
    {
        return $this->hasOne(Health::class);
    }

}
