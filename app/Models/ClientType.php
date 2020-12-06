<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientType extends Model
{

    use SoftDeletes;

    protected $table = 'client_types';
    public $timestamps = true;
    protected $fillable = array('name');


    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($client_type){
            $client_type->clients()->delete();

        });

    }


    # Model Relations

    public function clients()
    {
        return $this->hasMany(Client::class, 'type_id', 'id');
    }

}
