<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        User::create([
            "name" => "PutraJaya",
            "email" => "putrajaya@admin.com",
            "hak_akses" => "administrator",
            "password" => Hash::make('admin')

        ]);

        User::create([
            "name" => "PutraJaya",
            "email" => "putrajaya@superadmin.com",
            "hak_akses" => "superadministrator",
            "password" => Hash::make('superadmin')
        ]);
    }
}
