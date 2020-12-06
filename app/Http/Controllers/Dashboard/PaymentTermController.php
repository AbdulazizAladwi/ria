<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use App\Repositories\Interfaces\PaymentTermRepositoryInterface;
use Illuminate\Http\Request;

class PaymentTermController extends Controller
{
    public function index($id,OpportunityRepositoryInterface $opportunityRepository)
    {
        $opportunity = $opportunityRepository->find($id);
        return view('dashboard.invoices.payment-terms.index', [
           'title' => trans('site.payment_terms') . " - " . $opportunity->name,
           'opportunity_id' => $id,
           'opportunity'   => $opportunity
        ]);
    }
}
