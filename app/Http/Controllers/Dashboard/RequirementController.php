<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Opportunity;
use App\Models\Proposal;
use App\Models\ScopeOfWork;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class RequirementController extends Controller
{
    public function showDesign($opportunity_id, $requirement_id)
    {
        $opportunity = Opportunity::find($opportunity_id);
        return view('dashboard.opportunities.requirements.design.index', [
            'opportunityId' => $opportunity_id,
            'requirementId' => $requirement_id,
            'opportunity'   => $opportunity,
            'title'         => $opportunity->name . " - " .trans('site.design')
        ]);
    }


    public function showWireframe($opportunityId,$requirementId,OpportunityRepositoryInterface $opportunityRepository)
    {
        $opportunity = $opportunityRepository->find($opportunityId);
        $requirement = $opportunity->requirements()->findOrFail($requirementId);

        return view('dashboard.opportunities.requirements.wireframe.index',[
            'title' => $opportunity->name ."-". trans('site.wireframe'),
            'opportunity' => $opportunity,
            'requirement' => $requirement
        ]);
    }


    public function showProposal($opportunityId, $requirementId)
    {

        $opportunity = Opportunity::findOrFail($opportunityId);
        $requirement = $opportunity->requirements()->findOrFail($requirementId);
        $proposals = Proposal::all();

        return view('dashboard.opportunities.requirements.proposals.index', [

            'title'  => $opportunity['name'] . ' - ' . trans('site.proposal'),
            'opportunity' => $opportunity,
            'requirement' => $requirement,
            'proposals'   => $proposals

        ]);
    }

    public function showScopeOfWork($opportunityId, $requirementId,OpportunityRepositoryInterface $opportunityRepository)
    {
        $opportunity = $opportunityRepository->find($opportunityId);
        $requirement = $opportunity->requirements()->findOrFail($requirementId);

        return view('dashboard.opportunities.requirements.scope-of-works.index',[
            'title' => $opportunity->name . "-" . trans('site.scope_of_works'),
            'opportunity' => $opportunity,
            'requirement' => $requirement,
            'scopeOfWorks'   => ScopeOfWork::all()

        ]);
    }


}
