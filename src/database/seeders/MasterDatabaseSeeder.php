<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MasterDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => '管理者',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'ユーザー１',
            'email' => 'tt@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'ユーザー２',
            'email' => 'ss@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'ユーザー3',
            'email' => 'ee@example.com',
            'password' => Hash::make('password'),
        ]);


        //ロール作成
        $adminRole = Role::create(['name' => 'admin']);

        //権限の作成
        $creationPermission = Permission::create(['name' => 'creation']);

        //役割に権限を付与
        $adminRole->givePermissionTo([$creationPermission]);

        //権限の割り当て
        $admin->assignRole($adminRole);
    }
}
