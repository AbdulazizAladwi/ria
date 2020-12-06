<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function lang($lang)
    {
        Session::put('locale', $lang);

        return back();
    }
}
