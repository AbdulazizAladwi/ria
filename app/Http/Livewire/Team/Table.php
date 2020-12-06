<?php

namespace App\Http\Livewire\Team;

use App\Repositories\Interfaces\TeamRepositoryInterface;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

    use WithPagination;


    public $search = '';
    public $updatedId, $deletedId;
    public $name;
    public $update = false;

    protected $paginationTheme = 'bootstrap';

    protected $listeners =
        [
            'prepareAdd' => 'prepareAdd',
            'prepareUpdate' => 'prepareUpdate',
            'prepareDelete' => 'prepareDelete'
        ];


    public function prepareAdd()
    {
        $this->update = false;
        $this->resetValidation();
        $this->resetInputs();
    }



    public function prepareUpdate($id, TeamRepositoryInterface $teamRepository)
    {
        $this->resetValidation();

        $this->updatedId = $id;
        $this->update = true;
        $team = $teamRepository->find($id);
        $this->name = $team['name'];
    }

    public function prepareDelete($id)
    {
        $this->deletedId = $id;
    }

    public function resetInputs()
    {
        $this->name = null;
    }

    public function store(TeamRepositoryInterface $teamRepository)
    {
       $validatedData = $this->validate([
           'name' => ['required','min:3', Rule::unique('teams')->whereNull('deleted_at')]
       ]);
       $teamRepository->create($validatedData);
       $this->emit('team_added');
       $this->resetInputs();
    }

    public function update(TeamRepositoryInterface $teamRepository)
    {
        $validatedData = $this->validate([
            'name' => ['required','min:3', Rule::unique('teams')->whereNull('deleted_at')->ignore($this->updatedId)]
        ]);
        $team = $teamRepository->find($this->updatedId);
        $team->update($validatedData);
        $this->emit('team_updated');
        $this->resetInputs();
        $this->update = false;

    }

    public function delete(TeamRepositoryInterface $teamRepository)
    {
        $this->emit('teamDeleted');
        $teamRepository->delete($this->deletedId);

    }

    public function render(TeamRepositoryInterface $teamRepository)
    {
        return view('livewire.team.table', [
            'teams' => $teamRepository->search($this->search)
        ]);
    }
}
