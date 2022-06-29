<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = [
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'created_at' => Carbon::now()
            ],
            [
                'username' => 'editor',
                'password' => Hash::make('editor'),
                'created_at' => Carbon::now()
            ],
            [
                'username' => 'user',
                'password' => Hash::make('user'),
                'created_at' => Carbon::now()
            ]
        ];
        User::insert($user);

        Role::truncate();
        $role = [
            ['name' => 'admin', 'created_at' => Carbon::now()],
            ['name' => 'editor', 'created_at' => Carbon::now()],
            ['name' => 'user', 'created_at' => Carbon::now()],
        ];
        Role::insert($role);

        UserRole::truncate();
        $userRole = [
            ['user_id' => 1, 'role_id' => 1, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'role_id' => 2, 'created_at' => Carbon::now()],
            ['user_id' => 3, 'role_id' => 3, 'created_at' => Carbon::now()],
        ];
        UserRole::insert($userRole);
    }
}
