<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'phone', 'email', 'days', 'dashboard_logo', 'admin_image'];


    public function dashboardImagePath()
    {
        return Storage::url($this->dashboard_logo);
    }

    public function adminImagePath()
    {
       return Storage::url($this->admin_image);
    }

}
