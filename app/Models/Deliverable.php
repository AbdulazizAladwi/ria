<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverable extends Model
{
    use HasFactory;


    const WEBSITE       = 1;
    const Control_Panel = 2;
    const IOS_APP       = 3;
    const ANDROID_APP   = 4;
    


    public static function deliverables()
    {
        return [
            self::WEBSITE => trans('site.website'),
            self::Control_Panel => trans('site.control_panel'),
            self::IOS_APP => trans('site.ios_app'),
            self::ANDROID_APP => trans('site.android_app'),
        ];
    }

}
