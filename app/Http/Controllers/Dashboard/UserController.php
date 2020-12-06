<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    /**
     * path
     *
     * @var string
     */

    public $path  = 'dashboard.users';


    public function index()
    {
        return view("{$this->path}.index",[
            'title' => trans('site.users')
        ]);
    }

    public function create()
    {
        return view("{$this->path}.create",[
            'title'        => trans('site.add_user'),
            'rolesChoices' => $this->rolesChoices(),
        ]);
    }


    public function store(Request $request,UserRepositoryInterface $userRepository)
    {

        $user = $userRepository->create($this->formData($request));

        $user->assignRole($request->roles);

        toastSuccess(trans('site.added_successfully'));

        return redirect()->route("{$this->path}.index");

    }


    public function edit(User $user)
    {
        return view("{$this->path}.edit",[

            'title'        => trans('site.edit_user'),
            'user'         => $user,
            'rolesChoices' => $this->rolesChoices()

        ]);
    }


    public function update(Request $request,User $user)
    {

        $user->update($this->formData($request));

        $user->syncRoles($request->roles);

        toastSuccess(trans('site.updated_successfully'));

        return back();
    }




    protected function formData($request)
    {
         $this->validateData($request);
         return array_filter($request->except(['roles']));
    }

    protected function rolesChoices()
    {
        return Role::select('id','name')->get();
    }


    protected function validateData($request)
    {
        $putMethodName = 'PUT';
        $emailRule     = Rule::unique('users')->whereNull('deleted_at');
        $passRule      = 'required';

        if ( $request->method() == $putMethodName )
        {
            $id = $request->route('user')->id;
            $emailRule = $emailRule->ignore($id);
            $passRule = 'nullable';
        }

        $rules = [

            'name'     =>  'required|max:100',
            'email'    => ['required','email','max:100',$emailRule],
            'password' =>  [$passRule,'max:50','confirmed'],
            'roles'    =>  'required',
        ];


        return $request->validate($rules);



    }
}
