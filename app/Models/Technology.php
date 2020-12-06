<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    const PHP_LARAVEL           = 1;
    const MYSQL                 = 2;
    const BOOTSTRAP_HTML_CSS    = 3;
    const REACT_NATIVE          = 4;


    public static function technologies ()
    {
        return [
            self::PHP_LARAVEL           => trans('site.php_laravel'),
            self::MYSQL                 => trans('site.mysql'),
            self::BOOTSTRAP_HTML_CSS    => trans('site.bootstrap_html_css'),
            self::REACT_NATIVE          => trans('site.react_native'),
        ];
    }

}
