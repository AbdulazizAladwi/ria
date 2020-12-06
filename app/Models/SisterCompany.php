<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SisterCompany extends Model
{


    use SoftDeletes;

    protected $table = 'sister_companies';

    protected $fillable = array('name', 'phone1', 'phone2', 'email1', 'email2', 'client_id');



}
