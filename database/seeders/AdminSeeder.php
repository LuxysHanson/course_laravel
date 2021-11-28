<?php

namespace Database\Seeders;

use App\Components\Enums\UsersRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.ru',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
            'role' => UsersRoleEnum::ROLE_SUPER
        ]);
    }
}
