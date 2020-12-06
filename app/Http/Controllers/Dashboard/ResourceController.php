<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * @var $baseView
     */

    protected $base = 'dashboard.resources';

    public function index()
    {
        return view("{$this->base}.index",[
            'title' => trans('site.resources')
        ]);
    }
}
