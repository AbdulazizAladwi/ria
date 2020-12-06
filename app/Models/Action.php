<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Action extends Model
{

    use SoftDeletes;

    protected $table = 'actions';
    public $timestamps = true;



    protected $fillable = array('description', 'date_time', 'file','duration', 'opportunity_id','client_id','stage_number');





    # Model methods


    public function date()
    {
        $date = Carbon::parse($this->date_time);

        return $date->toDateString();
    }

    public function time()
    {
        $date = Carbon::parse($this->date_time);
        return $date->toTimeString('minute');
    }

    public function hasFile()
    {
        return !is_null($this->file);
    }

    public function filePath()
    {
        return Storage::url($this->file);
    }

    public function getStringFileName()
    {
        return substr(strchr($this->file, "/"), 1);
    }

    public function hasDuration()
    {
        return !is_null($this->duration);
    }

    public function stageString()
    {

        return Opportunity::stages()[$this->stage_number];
    }

    public function wordWrap()
    {
        return wordwrap($this->description, 20, "\n", true);
    }

   
   

    # Model relations


    public function opportunity()
    {
       return $this->belongsTo(Opportunity::class);
    }



}
