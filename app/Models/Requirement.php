<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Requirement extends Model
{

    use SoftDeletes;

    protected $table = 'requirements';
    public $timestamps = true;
    protected $fillable = array('type', 'deadline', 'opportunity_id');





    const PROPOSAL      = 0;
    const SCOPE_OF_WORK = 1;
    const DESIGN        = 2;
    const WIREFRAME     = 3;


   

    # Model methods

    public static function getRequirements()
    {
        return [
            self::PROPOSAL => trans('site.proposal'),
            self::SCOPE_OF_WORK => trans('site.scope_of_work'),
            self::DESIGN => trans('site.design'),
            self::WIREFRAME => trans('site.wireframe'),
        ];
    }

    public function requirementString()
    {
        return $this->getRequirements()[$this->type];
    }



    public function showUrl()
    {
        return url('opportunities/'. $this->opportunity->id . '/' .  Str::slug($this->requirementString()) . '/'. $this->id);
    }


    # Model relations

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }

}
