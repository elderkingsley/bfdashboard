<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [

        'date',
        'expense',
        'amount',
        'beneficiary',
        'narration',
        'image'

    ];

    protected $primaryKey = 'expense_id';
}
