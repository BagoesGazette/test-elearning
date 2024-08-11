<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'  => bcrypt('cobadiuji'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name'      => 'User',
            'email'     => 'user@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'  => bcrypt('cobadiuji'),
        ]);
        $user->assignRole('user');

        $mentor1 = User::create([
            'name'      => 'Gading Thamrin',
            'email'     => 'gading@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'  => bcrypt('cobadiuji'),
        ]);
        $mentor1->assignRole('mentor');

        $mentor2 = User::create([
            'name'      => 'Eman Suwarno',
            'email'     => 'eman@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'  => bcrypt('cobadiuji'),
        ]);
        $mentor2->assignRole('mentor');
    }
}
