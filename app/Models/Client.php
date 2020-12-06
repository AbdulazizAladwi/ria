<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

    use SoftDeletes;



    protected $table = 'clients';
    protected $fillable = [
        'name',
        'type_id',
        'phone1',
        'phone2',
        'phone_extension',
        'email1',
        'email2',
        'website',
        'instagram',
        'facebook',
        'twitter',
        'snapchat'
    ];

    # Boot method

    protected static function boot() {
        parent::boot();
    
        static::deleted(function ($client) {
          $client->opportunities()->delete();
          $client->contacts()->delete();
        });
      }

    # Model Relations

    public function type()
    {
      return $this->belongsTo(ClientType::class, 'type_id', 'id');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'client_id', 'id');
    }

    public function sisterCompanies()
    {
        return $this->hasMany(SisterCompany::class, 'client_id', 'id');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }


}
