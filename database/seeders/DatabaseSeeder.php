<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Lead;
use App\Models\Course;
use App\Models\Curricullam;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {



        $defaultPermissions = ['lead-management','create-admin','user-management'];
        foreach($defaultPermissions as $permission){
            Permission::create([
                'name' => $permission,
            ]);
        }




        $this->create_user_with_role('Super Admin','Super Admin','super-admin@lms.test');
        $this->create_user_with_role('communication','Communication Team','communication@lms.test');
        $teacher = $this->create_user_with_role('Teacher','Teacher','teacher@lms.test');
        $this->create_user_with_role('Leads','Leads','leads@lms.test');


        //create Lead
        Lead::factory(100)->create();

        //course Create
        $course = Course::create([
            'name' => 'laravel',
            'description'=> 'JavaScript is the worlds most popular programming languageJavaScript is the programming language of the Web',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqdYIr0oEuqAvLHyZzux-ACsBcIfWSjsU_Eg&usqp=CAU',
            'user_id' => $teacher->id,
            'price' =>500,
        ]);

        //curriculum Create
        Curricullam::factory(10)->create();
    }


    private function create_user_with_role($type,$name,$email){

        $role = Role::create([
            'name' => $type,
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password'),
        ]);

        if($type == 'Super Admin'){

           $role->givePermissionTo(Permission::all());

        }elseif($type == 'Leads'){
            $role->givePermissionTo('lead-management');
        }




        $user->assignRole($role);

        return $user;
    }
}
