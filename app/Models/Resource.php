<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{

    use SoftDeletes;

    protected $table = 'resources';

    protected $fillable = ['name','price', 'team_id'];


    const HOUR  = 1;
    const DAY   = 2;
    const WEEK  = 3;



    public static function estimation_types()
    {
        return [
            self::HOUR => trans('site.hour'),
            self::DAY => trans('site.day'),
            self::WEEK => trans('site.week'),
        ];
    }

    public function estimationTypeString()
    {
        return self::estimation_types()[$this->pivot->estimation_type];
    }


    # Model getters


    # Model Relations

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }


}
