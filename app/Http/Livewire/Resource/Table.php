<?php

namespace App\Http\Livewire\Resource;

use App\Repositories\Interfaces\ResourceRepositoryInterface;
use App\Repositories\Interfaces\TeamRepositoryInterface;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $teams,$name,$team_id,$price;
    public $update = false;
    public $resource = null;
    public $search="";
    public $deleteId = null;



    protected $paginationTheme = 'bootstrap';

    protected $listeners = [

        'createRequested' => 'prepareCreate',
        'updateRequested' => 'prepareUpdate',
        'deleteRequested' => 'prepareDelete',

    ];

    protected $queryString = [
        'search',
    ];








    public function mount(TeamRepositoryInterface $teamRepository)
    {
        $this->teams= $teamRepository->teamsChoices();
    }


    public function updatingSearch()
    {
        $this->gotoPage(1);
    }


    public function prepareCreate()
    {
        $this->update = false;
        $this->resetInputs();
        $this->resetValidation();
        $this->resource = null;
        $this->deleteId = null;
    }


    public function prepareUpdate($id,ResourceRepositoryInterface $resourceRepo)
    {
        $this->update = true;
        $this->resource = $resourceRepo->find($id);
        $this->team_id = $this->resource->team_id;
        $this->price = $this->resource->price;
        $this->name = $this->resource->name;
        $this->resetValidation();
    }

    public function prepareDelete($id)
    {
        $this->deleteId = $id;
    }






    protected function resetInputs()
    {
        $this->reset(['name','price','team_id']);
    }




    public function addResource(ResourceRepositoryInterface $resourceRepo)
    {
        $validatedData = $this->validate([
            'name'           => ['required','min:3','max:100',Rule::unique('resources')->whereNull('deleted_at')],
            'team_id'        => 'required|integer',
            'price'          => 'required|numeric|min:1'
        ]);
        $resourceRepo->create($validatedData);

        $this->prepareCreate();

        $this->emit('resourceAdded');


    }


    public function updateResource()
    {
        $validatedData = $this->validate([

            'name'               => ['required','min:3','max:100',Rule::unique('resources')->whereNull('deleted_at')->ignore($this->resource->id)],
            'team_id'            => 'required|integer',
            'price'              => 'required|numeric|min:1'

        ]);

        $this->resource->update($validatedData);

        $this->resetInputs();

        $this->emit('resourceUpdated',$this->resource->id);

    }


    public function deleteResource(ResourceRepositoryInterface $resourceRepo)
    {
        $this->emit('resourceDeleted',$this->deleteId);
        $resourceRepo->delete($this->deleteId);
        $this->prepareCreate();
    }



    public function render(ResourceRepositoryInterface $resourceRepo)
    {
        return view('livewire.resource.table',[

            'resources' => $resourceRepo->paginatedResources($this->search,5)

        ]);
    }
}
