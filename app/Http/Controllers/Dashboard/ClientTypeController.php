<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class ClientTypeController extends Controller
{

    public function index()
    {

        return view('dashboard.client-types.index',[

           'title' => trans('site.client_types')

       ]);
    }

}
