<?php

namespace App\Http\Controllers\Dashboard\Requirement;

use App\Http\Controllers\Controller;
use App\Models\Deliverable;
use App\Models\Requirement;
use App\Models\Resource;
use App\Models\ScopeOfWork;
use App\Models\Technology;
use Illuminate\Support\Facades\Gate;

class SowController extends Controller
{
    public function show($requirement_id, $scope_id)
    {
        $swo              = ScopeOfWork::findOrFail($scope_id);
        $opportunity      = $swo->requirement->opportunity;

        return view('dashboard.opportunities.requirements.scope-of-works.show', [
            'title'              => @trans('site.show_sow'),
            'requirement_id'     => $requirement_id,
            'sow'                => $swo,
            'opportunity'        => $opportunity,
        ]);
    }


    public function create($requirement_id)
    {

        $requirement = Requirement::findOrFail($requirement_id);
        $opportunity = $requirement->opportunity;
        $client = $opportunity->client;

        abort_if(Gate::denies('edit-requirements',$opportunity),404);


        return view('dashboard.opportunities.requirements.scope-of-works.create', [

            'title'         => @trans('site.create_sow'),
            'requirementId' => $requirement_id,
            'opportunity'   => $opportunity,
            'client'        => $client,

        ]);
    }


    public function edit($requirement_id, $proposal_id)
    {
        $sow = ScopeOfWork::findOrFail($proposal_id);
        $opportunity = $sow->requirement->opportunity;
        $client       = $opportunity->client;


        abort_if(Gate::denies('edit-requirements',$opportunity),404);


        return view('dashboard.opportunities.requirements.scope-of-works.edit', [
            'title'             => trans('site.edit_sow'),
            'requirementId'     => $requirement_id,
            'sow'               => $sow,
            'opportunity'       => $opportunity,
            'client'            => $client,
        ]);
    }
}
