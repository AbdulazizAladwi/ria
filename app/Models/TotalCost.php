<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalCost extends Model
{
    use HasFactory;
    protected $fillable = ['margin', 'discount','totalprice'];

    public function proposals()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id', 'id');
    }
}
