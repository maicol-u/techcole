<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignRoleToUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(1);

        if ($user) {
            // Buscar el rol con ID 1
            $role = Role::find(1);

            if ($role) {
                // Asignar el rol al usuario
                $user->assignRole($role);
                echo "Rol '{$role->name}' asignado a {$user->name}\n";
            } else {
                echo "No se encontró el rol con ID 1.\n";
            }
        } else {
            echo "No se encontró el usuario con ID 1.\n";
        }
    }
}
