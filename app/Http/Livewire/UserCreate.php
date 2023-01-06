<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $role;

    protected $rules =[
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required'
    ];
    public function render()
    {
        $roles =Role::all();
        return view('livewire.user-create',[
            'roles' => $roles
        ]);
    }


    public function formSubmit(){
        $this->validate();
        
        $user =User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' =>Hash::make($this->password),
        ]);
        
        $user->assignRole($this->role);

        flash()->addSuccess('New User Saved Successfully');
        
        return redirect()->route('user.index');

    }
}
