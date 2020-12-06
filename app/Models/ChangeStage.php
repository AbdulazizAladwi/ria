<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeStage extends Model
{
    use HasFactory;

    protected $fillable = [

        'opportunity_id',
        'from_stage',
        'to_stage',
        'changed_date'
    ];


}
