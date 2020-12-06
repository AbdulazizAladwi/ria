<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Proposal extends Model
{

    use SoftDeletes;

    protected $table = 'proposals';
    protected $fillable = array('client_id', 'date', 'estimation','features','estimation_type', 'discount', 'requirement_id','technologies','deliverables');

    protected $dates = ['date'];

    protected $casts = [

           'technologies' => 'array',
           'deliverables' => 'array'
    ];


    public function resources()
    {
        return $this->belongsToMany(Resource::class,'proposal_resource','proposal_id','resource_id')->withPivot('estimation_type', 'estimation');
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirement_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function cost()
    {
        return $this->hasOne(TotalCost::class, 'proposal_id', 'id');
    }

    # Model methods


    public function hasPrice()
    {
        return $this->cost()->count() > 0;
    }

}
