<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function opportunityReport()
    {
        return view('dashboard.reports.opportunity',[
            'title' => trans('site.opportunity-report')
        ]);
    }


    public function proposalReport()
    {
        return view('dashboard.reports.proposal', [
           'title'  => trans('site.proposal_report')
        ]);
    }


    public function activityReport()
    {
        return view('dashboard.reports.activity',[
            'title' => trans('site.activity-report')
        ]);
    }


    public function invoiceReport()
    {
        return view('dashboard.reports.invoice',[
            'title' => trans('site.invoice-report')
        ]);
    }
}
