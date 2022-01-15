<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nip' => '12345',
                'nama' => 'Kurikulum',
                'email' => 'kurikulum@gmail.com',
                'alamat' => 'bogor',
                'role' => 'kurikulum',
                'supervisor' => '1',
                'password' => bcrypt('12345678'),
            ],
            [
                'nip' => '112233',
                'nama' => 'Kepsek',
                'email' => 'kepsek@gmail.com',
                'alamat' => 'bogor',
                'role' => 'kepsek',
                'supervisor' => '0',
                'password' => bcrypt('12345678'),
            ],
            ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
