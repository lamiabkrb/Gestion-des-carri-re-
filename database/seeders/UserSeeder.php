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
            ]
        );
        $grh->assignRole($rolegrh);

        $manager = User::firstOrCreate(
            ['email'=>'manager@gmail.com'],
            [
                'name'=>'Manager',
                'password'=>Hash::make('azerty'),
            ]
        );
        $manager->assignRole($roleManager);
        
    }
}
