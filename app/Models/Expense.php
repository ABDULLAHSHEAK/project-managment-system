<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = ['note', 'amount', 'category_id','date'];

    public function category(){
        return $this->belongsTo(ExpenseCategory::class, 'category_id');
    }
}
