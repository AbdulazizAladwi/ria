<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTerm extends Model
{

    use SoftDeletes;


    protected $table = 'payment_terms';

    public $timestamps = true;


    protected $dates = ['deleted_at'];


    protected $fillable = array('name', 'percentage', 'amount', 'date', 'status', 'opportunity_id');

    const UPCOMING     = 1;
    const DELAYED      = 2;
    const DONE         = 3;


    # Methods


    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($payment_term){
            $payment_term->invoices()->delete();

        });

    }


    public static function status()
    {
        return [


            self::DONE     => trans('site.done'),
            self::DELAYED  => trans('site.delayed'),
            self::UPCOMING => trans('site.upcoming')

        ];

    }


    public function makeDone()
    {
        $this->update([
            'status' => self::DONE
        ]);
    }

    public function makeDelayed()
    {
        $this->update([
            'status' => self::DELAYED
        ]);
    }


    public function isUpcoming()
    {
        return $this->status == self::UPCOMING;
    }

    public function isDelayed()
    {
        return $this->status == self::DELAYED;
    }

    public function isDone()
    {
        return $this->status == self::DONE;
    }

    public function hasInvoices()
    {
        return $this->invoices->count() != 0;
    }


    /**
     * statusString
     *
     * @return void
     */
    public function statusString()
    {
        return self::status()[$this->status];
    }


    # Model relations

    /**
     * opportunity
     *
     * @return void
     */
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }

    /**
     * invoices
     *
     * @return void
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
