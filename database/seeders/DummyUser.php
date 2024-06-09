<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $userData = [
            [
                'name'=>'Super Admin',
                'email'=>'superadmin@csrmahulu.com',
                'role'=>'superadmin',
                'password'=> bcrypt('CsrMahulu2024@'),
            ],
            [
                'name'=>'Perusahaan ABC',
                'email'=>'abc@csrmahulu.com',
                'role'=>'perusahaan',
                'password'=> bcrypt('CsrMahulu2024@'),
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
