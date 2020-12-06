<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScopeOfWork extends Model
{
    use HasFactory;


    protected $fillable = array('date', 'estimation','features','estimation_type','client_id','discount', 'requirement_id','technologies','deliverables');


    protected $casts = [

        'technologies' => 'array',
        'deliverables' => 'array'
    ];


    public function resources()
    {
        return $this->belongsToMany(Resource::class,'sow_resource','sow_id','resource_id')->withPivot('estimation_type', 'estimation');
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirement_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
