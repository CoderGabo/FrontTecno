<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gabriel Diaz',
            'email' => 'gabdihu@correo.com',
            'password' => bcrypt('123456'),
            'id_rol' => 1
        ]);
        User::factory(3)->create();
    }
}
