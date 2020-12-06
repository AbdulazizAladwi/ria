<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opportunity extends Model
{


    use SoftDeletes;

    protected $table = 'opportunities';

    protected $fillable = ['name', 'contact_id','client_id','status','stage'];

    /**
     * Stages Constants
     *
     */

    const CLIENTPROSPECT = 1;
    const QUALIFICATION  = 2;
    const PRESALES       = 3;
    const FEEDBACK       = 4;

    /**
     * Status constants
     *
     */

    const QUALIFIED    = 1;
    const UNQUALIFIED  = 2;
    const WON          = 3;
    const LOST         = 4;
    const HOLD         = 5;
    const CANCELED     = 6;



    # Boot method

    protected static function boot() {
        parent::boot();

        static::deleted(function ($opportunity) {
          $opportunity->actions()->delete();
          $opportunity->proposals()->delete();
          $opportunity->requirements()->delete();
          $opportunity->stageSteps()->delete();
          $opportunity->paymentTerms()->delete();
        });
      }


    /**
     * Get stages array
     * @return array
     */

    public static function stages()
    {
        return [
            self::CLIENTPROSPECT => trans('site.prospect'),
            self::QUALIFICATION  => trans('site.qualification'),
            self::PRESALES       => trans('site.pre-sales'),
            self::FEEDBACK       => trans('site.feedback')
        ];
    }


    /**
     * Get status array
     * @return array
     */
    public static function getStatus()
    {
        return [
            self::QUALIFIED   => trans('site.qualified'),
            self::UNQUALIFIED => trans('site.unqualified'),
            self::WON  => trans('site.won'),
            self::LOST => trans('site.lost'),
            self::HOLD => trans('site.hold'),
            self::CANCELED => trans('site.canceled'),
        ];
    }

    /**
     * Return status of each stage if exists
     * @param integer $stageConst
     * @return array of status or null
     */

    public static function statusByStage($stageNumber)
    {
        if ( $stageNumber == self::FEEDBACK )
        {
            return [
                self::WON  => trans('site.won'),
                self::LOST => trans('site.lost'),
                self::HOLD => trans('site.hold'),
                self::CANCELED => trans('site.canceled'),
            ];
        }

        return [
            self::QUALIFIED   => trans('site.qualified'),
            self::UNQUALIFIED => trans('site.unqualified'),
        ];
    }


    # Model methods

    public function stageString()
    {
        return self::stages()[$this->stage];
    }

    public function statusString()
    {
        return self::getStatus()[$this->status] ?? 'Pending';
    }

    public function hasStatus()
    {
        return !is_null($this->status);
    }

    public function isNotQualified()
    {
        return $this->status == self::UNQUALIFIED;
    }

    public function inFirstStage()
    {
        return $this->stage == self::CLIENTPROSPECT;
    }

    public function inLastStage()
    {
        return $this->stage == self::FEEDBACK;
    }

    public function stageIsOver($stageNumber)
    {
        return $this->stage > $stageNumber;
    }




    public function hasLastStatus()
    {
        $status = $this->status;

        return $status == self::WON || $status == self::LOST || $status == self::HOLD || $status == self::CANCELED;
    }


    public function changed($from,$to)
    {
        return $this->stageSteps()->whereFromStage($from)->whereToStage($to)->exists();
    }

    public function hasContact()
    {
        return !is_null($this->contact_id);
    }


    public function isWon()
    {
        return $this->status == self::WON;
    }

    public function hasAllTerms()
    {
        return $this->paymentTerms()->sum('percentage') == 100;
    }

    public function hasTerms()
    {
        return $this->paymentTerms()->count() != 0;
    }


    /**
     * proposalPrice
     *
     * @return 0
     */

    public function proposalPrice()
    {
        $proposal = $this->proposals()->latest()->first();

        if ( !$proposal ) return 0;

        return $proposal->hasPrice() ? $proposal->cost->totalprice  : 0;
    }


    public function hasStage()
    {
        return !is_null($this->stage);
    }







    # Model Scopes

    public function scopeWonOpportunities($q)
    {
        return $q->whereStatus(self::WON);
    }

    public function scopeHoldOpportunities($q)
    {
        return $q->whereStatus(self::HOLD);
    }

    public function scopeLostOpportunities($q)
    {
        return $q->whereStatus(self::LOST);
    }

    public function scopeCanceledOpportunities($q)
    {
        return $q->whereStatus(self::CANCELED);
    }



    # Model relations

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }

    public function stageSteps()
    {
        return $this->hasMany(ChangeStage::class,'opportunity_id','id');
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function wireframes()
    {
        return $this->hasManyThrough(Wireframe::class,Requirement::class);
    }


    public function proposals()
    {
        return $this->hasManyThrough(Proposal::class,Requirement::class);
    }

    public function scopeOfWorks()
    {
        return $this->hasManyThrough(ScopeOfWork::class,Requirement::class);
    }

    public function paymentTerms()
    {
        return $this->hasMany(PaymentTerm::class);
    }

    public function invoices()
    {
        return $this->hasManyThrough(Invoice::class,PaymentTerm::class);
    }

}
