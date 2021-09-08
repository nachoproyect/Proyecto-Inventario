<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
       $role1 = Role::create(['name'=> 'Admin']);
       $role2 = Role::create(['name'=> 'Tecnico']);
       $role3 = Role::create(['name'=> 'Usuario']);
       

       Permission::create (['name' => 'articulo.index'])->syncRoles([$role1,$role2,$role3]);
       Permission::create (['name' => 'articulo.create'])->syncRoles([$role1,$role2]);
       Permission::create (['name' => 'articulo.edit'])->syncRoles([$role1,$role2]);
       Permission::create (['name' => 'articulo.destroy'])->syncRoles([$role1]);
       Permission::create(['name' => 'articulo.show'])->syncRoles([$role1, $role2, $role3]);

       Permission::create (['name' => 'categoria.index'])->syncRoles([$role1,$role2,$role3]);
       Permission::create (['name' => 'categoria.create'])->syncRoles([$role1,$role2]);
       Permission::create (['name' => 'categoria.edit'])->syncRoles([$role1,$role2]);
       Permission::create (['name' => 'categoria.destroy'])->syncRoles([$role1]);
       Permission::create(['name' => 'categoria.show'])->syncRoles([$role1, $role2, $role3]);

       Permission::create (['name' => 'sector.index'])->syncRoles([$role1,$role2,$role3]);
       Permission::create (['name' => 'sector.create'])->syncRoles([$role1,$role2]);
       Permission::create (['name' => 'sector.edit'])->syncRoles([$role1,$role2]);
       Permission::create (['name' => 'sector.destroy'])->syncRoles([$role1]);
       Permission::create(['name' => 'sector.show'])->syncRoles([$role1, $role2, $role3]);

       Permission::create (['name' => 'sede.index'])->syncRoles([$role1,$role2,$role3]);
       Permission::create (['name' => 'sede.create'])->syncRoles([$role1,$role2]);
       Permission::create (['name' => 'sede.edit'])->syncRoles([$role1,$role2]);
       Permission::create (['name' => 'sede.destroy'])->syncRoles([$role1]);
       Permission::create(['name' => 'sede.show'])->syncRoles([$role1, $role2, $role3]);
       
       Permission::create (['name' => 'user.index'])->syncRoles([$role1]);
       Permission::create (['name' => 'user.create'])->syncRoles([$role1]);
       Permission::create (['name' => 'user.edit'])->syncRoles([$role1]);
       Permission::create (['name' => 'user.destroy'])->syncRoles([$role1]);
       Permission::create(['name' => 'user.show'])->syncRoles([$role1]);

       Permission::create (['name' => 'relevamiento.index'])->syncRoles([$role1]);
       Permission::create (['name' => 'relevamiento.create'])->syncRoles([$role1]);
       Permission::create (['name' => 'relevamiento.edit'])->syncRoles([$role1]);
       Permission::create (['name' => 'relevamiento.destroy'])->syncRoles([$role1]);
       Permission::create(['name' => 'relevamiento.show'])->syncRoles([$role1, $role2, $role3]);
       
       Permission::create (['name' => 'marca.index'])->syncRoles([$role1,$role2,$role3]);
       Permission::create (['name' => 'marca.create'])->syncRoles([$role1,$role2]);
       Permission::create (['name' => 'marca.edit'])->syncRoles([$role1,$role2]);
       Permission::create (['name' => 'marca.destroy'])->syncRoles([$role1]);
       Permission::create(['name' => 'marca.show'])->syncRoles([$role1, $role2, $role3]);

       




    }
}
