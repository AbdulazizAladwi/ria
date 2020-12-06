<?php

namespace App\Http\Controllers\Dashboard\Requirement;

use App\Http\Controllers\Controller;
use App\Models\Deliverable;
use App\Models\Proposal;
use App\Models\Requirement;
use App\Models\Resource;
use App\Models\Technology;
use App\Repositories\Interfaces\ProposalRepositoryInterface;
use Illuminate\Support\Facades\Gate;


class ProposalController extends Controller
{

    public $proposal;
    public function __construct(ProposalRepositoryInterface $proposalRepository)
    {
        $this->proposal = $proposalRepository;
    }


    public function show($requirement_id, $proposal_id)
    {
        $proposal =  $this->proposal->find($proposal_id);
        $opportunity = $proposal->requirement->opportunity;

        return view('dashboard.opportunities.requirements.proposals.show', [
            'title'         => @trans('site.show_proposal'),
            'requirement_id' => $requirement_id,
            'proposal'      => $proposal,
            'opportunity'   => $opportunity,
        ]);
    }

    public function edit($requirement_id, $proposal_id)
    {
        $proposal =  $this->proposal->find($proposal_id);
        $opportunity = $proposal->requirement->opportunity;
        $client = $opportunity->client;

        abort_if(Gate::denies('edit-requirements',$opportunity),404);

        return view('dashboard.opportunities.requirements.proposals.edit', [
            'title'             => trans('site.edit_proposal'),
            'requirementId'     => $requirement_id,
            'proposal'          => $proposal,
            'opportunity'       => $opportunity,
            'client'            => $client,
        ]);
    }


    public function create($requirement_id)
    {

        $requirement = Requirement::findOrFail($requirement_id);
        $opportunity = $requirement->opportunity;
        $client = $opportunity->client;

        abort_if(Gate::denies('edit-requirements',$opportunity),404);

        return view('dashboard.opportunities.requirements.proposals.create', [
            'title'         => @trans('site.create_proposal'),
            'requirementId' => $requirement_id,
            'opportunity'   => $opportunity,
            'client'        => $client,

        ]);
    }

}
