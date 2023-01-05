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






        $this->create_user_with_role('Super Admin','Super Admin','super-admin@lms.test');
        $this->create_user_with_role('communication','Communication Team','communication@lms.test');
        $teacher = $this->create_user_with_role('Teacher','Teacher','teacher@lms.test');
        $teacher = $this->create_user_with_role('Leads','Leads','leads@lms.test');


        //create Lead
        Lead::factory(100)->create();

        //course Create
        $course = Course::create([
            'name' => 'laravel',
            'description'=> 'JavaScript is the worlds most popular programming languageJavaScript is the programming language of the Web',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqdYIr0oEuqAvLHyZzux-ACsBcIfWSjsU_Eg&usqp=CAU',
            'user_id' => $teacher->id,
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
            $permission = Permission::create([
                'name' => 'create-admin',
            ]);
            $role->givePermissionTo($permission);

        }




        $user->assignRole($role);

        return $user;
    }
}
