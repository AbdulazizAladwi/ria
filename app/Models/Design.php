<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Design extends Model
{

    use SoftDeletes;
    protected $table = 'designes';
    public $timestamps = true;
    protected $fillable = array('description', 'file', 'requirement_id');

    public function filePath()
    {
        return Storage::url($this->file);
    }

}
