<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('roles')->insert([
            'name' => 'admin',
            'grant_all' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('permissions')->insert([
            'name' => 'Admin_dashboard',
            'route_name' => 'admin',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin',
            'password' => Hash::make('admin'),
            'email_verified_at' => Carbon::now(),
            'created_at' => $now,
            'updated_at' => $now,
            'role_id' => 1,
        ]);
    }
}
