<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{

    protected $table = 'receipts';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('number', 'date', 'invoice_id');

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

}
