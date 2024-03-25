<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'id',
        'title',
        'type'
    ];
    const TYPE_INCOME = 'income';
    const TYPE_EXPENSE = 'expense';
    const TYPES=[
        self::TYPE_INCOME,
        self::TYPE_EXPENSE
    ];

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }
}
