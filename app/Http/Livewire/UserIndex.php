<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserIndex extends Component
{
    public $name;
    public function render()
    {

        

        $users =User::paginate(50);
        $roles=Role::all();

        return view('livewire.user-index',[
            'roles' =>$roles,
            'users' => $users,
            
        ]);
    }



    public function userDelete($id){

        $user = User::findOrFail($id);
        $user->delete();
        
        flash()->addSuccess('User Deleted Successfull');

    }
}
