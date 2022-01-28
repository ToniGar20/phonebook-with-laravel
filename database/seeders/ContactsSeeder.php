<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                'first_name' => 'Administrador',
                'last_name' => 'Supremo',
                'phone' => 666999333,
                'phone_type' => 'Casa',
                'description' => NULL,
                'is_favourite' => 0,
                'users_id' => 1
            ],
            [
                'first_name' => 'The Incredible',
                'last_name' => 'Hulk',
                'phone' => 785222536,
                'phone_type' => 'Móvil',
                'description' => 'Mi superhéroe preferido',
                'is_favourite' => 1,
                'users_id' => 1
            ],
            [
                'first_name' => 'Josep',
                'last_name' => 'Pedrerol',
                'phone' => 666999333,
                'phone_type' => 'Trabajo',
                'description' => 'Está loco',
                'is_favourite' => 0,
                'users_id' => 1
            ],
            [
                'first_name' => 'Arturo',
                'last_name' => 'Pérez Reverte',
                'phone' => 654321987,
                'phone_type' => 'Móvil',
                'description' => 'La suele liar en Twitter',
                'is_favourite' => 0,
                'users_id' => 2
            ],
            [
                'first_name' => 'Toni',
                'last_name' => 'García',
                'phone' => 662426246,
                'phone_type' => 'Móvil',
                'description' => 'Creo que lo conozco...',
                'is_favourite' => 1,
                'users_id' => 2
            ],
            [
                'first_name' => 'Enrique',
                'last_name' => 'Pastor',
                'phone' => 777001002,
                'phone_type' => 'Móvil',
                'description' => 'Aquí aquí aquí no hay quién vivaaaa.... uuuuhhh',
                'is_favourite' => 0,
                'users_id' => 1
            ],
            [
                'first_name' => 'Marge',
                'last_name' => 'Simpson',
                'phone' => 871464609,
                'phone_type' => 'Casa',
                'description' => NULL,
                'is_favourite' => 0,
                'users_id' => 1
            ],
        ];
        DB::table('contacts')->insert($contacts);
    }
}
