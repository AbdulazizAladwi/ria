<?php

namespace App\Http\Livewire\User;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search,$userToDelete;

    public $queryString = [

        'search' => ['except' => ''],
    ];

    protected $listeners = [

        'prepareDelete'

    ];



    public function prepareDelete($id,UserRepositoryInterface $userRepository)
    {
        $this->userToDelete = $userRepository->find($id);
    }


    public function deleteUser()
    {
        $this->userToDelete->delete();

        $this->emit('userDeleted');
    }



    protected $paginationTheme = 'bootstrap';

    public function render(UserRepositoryInterface $userRepository)
    {
        return view('livewire.user.table',[

            'users' => $userRepository->search($this->search)
        ]);
    }
}
