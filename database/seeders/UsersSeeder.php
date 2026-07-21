<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'nama' => 'Admin',
                'nik' => 'admin',
                'role' => 'admin',
                'password' => bcrypt('123456')
           

            ],
            [
                'nama' => 'Helpdesk',
                'nik' => 'helpdesk',
                'role' => 'helpdesk',
                'password' => bcrypt('123456')
           

            ],
            [
                'nama' => 'Rahma Nurhaliza',
                'nik' => '2104176',
                'role' => 'pegawai',
                'password' => bcrypt('12345678')
           

            ],
            [
                'nama' => 'Getar Rachmatulloh',
                'nik' => '2210049',
                'role' => 'pegawai',
                'password' => bcrypt('12345678')
           

            ]

            ];
            foreach($userData as $key => $val){
                User::create($val);
            }
    }
}
