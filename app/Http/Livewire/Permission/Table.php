<?php

namespace App\Http\Livewire\Permission;

use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Table extends Component
{
    use WithPagination;

    public $deleteID, $search;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirmation' => 'prepareDelete'];


    public function prepareDelete($id)
    {
        $this->deleteID = $id;
    }

    public function updatingSearch()
    {
        $this->gotoPage(1);
    }



    protected $queryString = ['search'];

    public function delete()
    {
       $role =  Role::findById($this->deleteID);
       if ($role->id != 1)
       {
           $role->delete();
           $this->emit('roleDeleted');
       }
       else
       {
           $this->emit('cannotDelete');
       }
    }

    public function render(PermissionRepositoryInterface $permissionRepository)
    {
        return view('livewire.permission.table', [
            'roles' => $permissionRepository->roles($this->search)
        ]);
    }
}
