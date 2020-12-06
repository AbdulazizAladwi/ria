<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Invoice extends Model
{

    protected $table = 'invoices';
    public $timestamps = true;

    const NEW           = 1;
    const DELIVERED     = 2;
    const PAID          = 3;
    const CANCELLED     = 4;


    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('number', 'name', 'date', 'status', 'percentage', 'notes', 'amount', 'payment_term_id');


    public static function status()
    {
        return [
           self::NEW        => trans('site.new'),
           self::DELIVERED  => trans('site.delivered'),
           self::PAID       => trans('site.paid'),
           self::CANCELLED  => trans('site.cancelled'),

        ];
    }


   # Model methods

    public function limittedNotes()
    {
        return Str::limit($this->notes,10);
    }

    public function isNew()
    {
        return $this->status == self::NEW ;
    }

    public function isDelivered()
    {
        return $this->status == self::DELIVERED ;
    }


    public function isPaid()
    {
        return $this->status == self::PAID;
    }

    public function isCancelled()
    {
        return $this->status == self::CANCELLED;
    }


    public function statusString()
    {
        return self::status()[$this->status] ?? '-';
    }


    public function hasReceipt()
    {
        return $this->receipt()->count() != 0;
    }



    # Model relations

    public function getClientAttribute()
    {
        return $this->paymentTerm->opportunity->client;
    }

    public function getContactAttribute()
    {
        return $this->paymentTerm->opportunity->contact;
    }

    public function paymentTerm()
    {
        return $this->belongsTo(PaymentTerm::class);
    }

    public function receipt()
    {
        return $this->hasOne(Receipt::class);
    }


    # Model Scopes

    public function scopePaidInvoices($query)
    {
        return $query->whereStatus(self::PAID);
    }


}
