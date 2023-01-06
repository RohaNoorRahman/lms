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
    public $role;


    
    public function mount(){
        $user = User::findOrFail($this->user_id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }
    public function render()
    {
        $roles =Role::all();
        return view('livewire.user-edit',[
            'roles'=>$roles,
        ]);
    }

    protected $rules=[
        'name' => 'required',
        'email' => 'required',
        'role' => 'required|numeric|max:19'
    ];


    public function submitForm(){
        $user =User::findOrFail($this->user_id);
        
        
        $this->validate();
        
        
        $user->name =$this->name;
        $user->email =$this->email;
        $user->assignRole($this->role);
        $user->save();

        $this->role = '';
        flash()->addSuccess('User Edit Successfully');
        
        return redirect()->route('user.index');
    }


    
}
