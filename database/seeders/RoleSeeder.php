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
        $role1= Role::create(['name'=>'Admin']);
        $role2= Role::create(['name'=>'Blogger']);

        Permission::create(['name'=>'admin.home',
        'description'=>'ver dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'admin.users.index',
        'description'=>'Ver lista de usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit',
        'description'=>'crear nuevo usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.update',
        'description'=>'guardar nuevo usuario'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.categories.index',
        'description'=>'ver listado de categorias'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.categories.create',
        'description'=>'crear nueva categoria'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.edit',
        'description'=>'guardar nueva categoria'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.destroy',
        'description'=>'eliminar categoria'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.tags.index',
        'description'=>'ver listado de tags'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.tags.create',
        'description'=>'crear nuevo tag'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.edit',
        'description'=>'guardar nuevo tag'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.destroy',
        'description'=>'eliminar tag'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.posts.index',
        'description'=>'ver listado de post'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.create',
        'description'=>'crear nuevo post'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.edit',
        'description'=>'editar Post'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.destroy',
        'description'=>'eliminar post'])->syncRoles([$role1, $role2]);
    }
}
