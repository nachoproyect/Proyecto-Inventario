<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
              'name'=> 'Root Administrador',
              'email'=> 'root@gmail.com',
              'password'=> bcrypt('M4nz4n41984!')
        ])->assignRole('Admin');
    }
}