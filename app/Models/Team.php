<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name'];




    # Boot method

    protected static function boot() {
        parent::boot();
    
        static::deleted(function ($team) {
          $team->resources()->delete();
        });
      }


    # Model Relations

    public function resources()
    {
        return $this->hasMany(Resource::class, 'team_id', 'id');
    }
}
