<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Wireframe extends Model
{

    use SoftDeletes;

    protected $table = 'wireframes';
    public $timestamps = true;
    protected $fillable = array('description', 'file', 'requirement_id');


    # Model methods

    public function hasFile()
    {
        return !is_null($this->file);
    }

    public function filePath()
    {
        return Storage::url($this->file);
    }

}
