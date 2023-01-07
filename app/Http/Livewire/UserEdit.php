<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    public $name;
    public $email;
    public $user_id;
    public $selectedRole;


    
    public function mount(){
        $user = User::findOrFail($this->user_id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;

        if(isset($user->roles) && count($user->roles)>0){
            $this->selectedRole = $user->roles['0']->name;
        }
    }

    protected $rules=[
        'name' => 'required',
        'email' => 'required',
        'selectedRole' => 'required'
    ];

    public function render()
    {
        $roles =Role::all();
        return view('livewire.user-edit',[
            'roles'=>$roles,
        ]);
    }



    public function submitForm(){


        $this->validate();

        $user =User::with('roles')->findOrFail($this->user_id);
        
        
        
        
        
        $user->name =$this->name;
        $user->email =$this->email;
        $user->save();

        if(isset($user->roles) && count($user->roles)){
            $user->removeRole($user->roles[0]->name);
        }

        $user->assignRole($this->selectedRole);
        flash()->addSuccess('User Edit Successfully');
        
        return redirect()->route('user.index');
    }


    
}
