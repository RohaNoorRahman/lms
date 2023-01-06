<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleCreate extends Component
{
    public $selectedPermissions = [];
    public $name;
    public function render()
    {

        $permissions =Permission::all();


        return view('livewire.role-create',[
            'permissions' =>$permissions,
        ]);
    }

    protected $rules =[
        'name' => 'required|unique:roles,name',
        'selectedPermissions' => 'required|array|min:1'
    ];
    public function formSubmit(){
        $this->validate();

        $roles =Role::create(['name' => $this->name]);
        $roles->syncPermissions($this->selectedPermissions);

        
        flash()->addSuccess('Roll Created Successfully');

        return redirect()->route('role.index');

    }
}
