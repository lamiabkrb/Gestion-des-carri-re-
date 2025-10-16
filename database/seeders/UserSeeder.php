<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{

    public function run(): void
    { 
        $rolegrh = Role::where('name', 'grh')->first();
        $roleManager = Role::where('name', 'manager')->first();


        // Creation des utilisateurs
        $grh = User::firstOrCreate(
            ['email'=>'grh@gmail.com'],  //condition de recherche
            [ // verificaton si le user existe 
                'name'=>'admin RH ',
                'password'=>Hash::make('azerty'),
                'departement'=>'drh',
            ]
        );
        $grh->assignRole($rolegrh);

        $manager1 = User::firstOrCreate(
            ['email'=>'manager1@gmail.com'],
            [
                'name'=>'Manager1',
                'password'=>Hash::make('azerty'),
                'departement'=>'disr',
            ]
        );
        $manager1->assignRole($roleManager);
        
        $manager2 = User::firstOrCreate(
            ['email'=>'manager2@gmail.com'],
            [
                'name'=>'Manager2',
                'password'=>Hash::make('azerty'),
                'departement'=>'dfc',
            ]
        );
        $manager2->assignRole($roleManager);
    }
}
