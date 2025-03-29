<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'maicol-888@hotmail.com'], // Evita duplicados
            [
                'name' => 'Maicol', // Nombre del usuario
                'email' => 'maicol-888@hotmail.com',
                'password' => Hash::make('12345678'),
            ]
        );

        $this->command->info('Usuario creado: maicol-888@hotmail.com con contraseña 12345678');
    }
}
