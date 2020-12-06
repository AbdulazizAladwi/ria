<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{

    use SoftDeletes;

    protected $table = 'contacts';
    protected $fillable = array('name', 'phone1', 'phone2', 'email1', 'email2', 'gender','client_id','job_title', 'client_relation', 'instagram', 'facebook', 'twitter', 'snapchat');


    # Model relations

    public function client()
    {
        return $this->belongsTo(Client::class);
    }




}
