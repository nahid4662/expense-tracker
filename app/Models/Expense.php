<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'amount',
        'category_id',
        'description',
        'date',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
