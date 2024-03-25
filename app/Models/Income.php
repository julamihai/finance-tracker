<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'title',
        'amount',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Categories::class);
    }

}
