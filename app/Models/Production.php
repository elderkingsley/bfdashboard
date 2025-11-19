<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Production extends Model
{
        use HasFactory;

    protected $table = 'productions';

    protected $fillable = [

        'production_date',
        'production_process',
        'bags_of_paddy',
        'paddy_weight',
        'raw_materials_used',
        'raw_materials_weight',
        'info'

    ];

    protected $primaryKey = 'production_id';
}
