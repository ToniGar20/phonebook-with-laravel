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
                'phone_type' => 'Casa'
            ],
            [
                'first_name' => 'The Incredible',
                'last_name' => 'Hulk',
                'phone' => 785222536,
                'phone_type' => 'Móvil'
            ],
            [
                'first_name' => 'Josep',
                'last_name' => 'Pedrerol',
                'phone' => 666999333,
                'phone_type' => 'Chiringito'
            ],
            [
                'first_name' => 'Arturo',
                'last_name' => 'Pérez Reverte',
                'phone' => 654321987,
                'phone_type' => 'Móvil'
            ],
            [
                'first_name' => 'Toni',
                'last_name' => 'García',
                'phone' => 662426246,
                'phone_type' => 'Móvil'
            ],
            [
                'first_name' => 'Enrique',
                'last_name' => 'Pastor',
                'phone' => 777001002,
                'phone_type' => 'Móvil'
            ],
            [
                'first_name' => 'Marge',
                'last_name' => 'Simpson',
                'phone' => 871464609,
                'phone_type' => 'Casa'
            ],
        ];
        DB::table('contacts')->insert($contacts);
    }
}
