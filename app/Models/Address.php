<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{

    use SoftDeletes;
    protected $table = 'addresses';
    public $timestamps = true;
    protected $fillable = array('area', 'block', 'street', 'zip_code','client_id');

}
