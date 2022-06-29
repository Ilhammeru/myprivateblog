<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

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
                'name' => 'Super Admin',
                'nik' => '123456789',
                'username' => 'superadmin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('admin'),
                'role' => 'superadmin',
                'created_at' => Carbon::now(),
            ],
        ];

        User::insert($user);
    }
}
