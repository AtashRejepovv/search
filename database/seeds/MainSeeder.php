<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            [ 'id' => 1,
                'name' => 'mugallym',

            ],
            [ 'id' => 2,
                'name' => 'uly mugallym',

            ],
            [ 'id' => 3,
                'name' => 'kafedra müdiri',

            ],
            [ 'id' => 4,
                'name' => 'dekan',

            ],
            [ 'id' => 5,
                'name' => 'zam-dekan',

            ],
            [ 'id' => 6,
                'name' => 'prorektor',

            ],
            [ 'id' => 7,
                'name' => 'rektor',

            ],
        ]);

        DB::table('phone_types')->insert([
            [
                'id' => 1,
                'name' => 'gulluk belgisi',
            ],
            [
                'id' => 2,
                'name' => 'öý belgisi',
            ],
            [
                'id' => 3,
                'name' => 'el belgisi',
            ],
            [
                'id' => 4,
                'name' => 'tetra',
            ],
        ]);

        DB::table('ranks')->insert([
            [
                'id' => 1,
                'name' => 'kiçi seržant',
            ],
            [
                'id' => 2,
                'name' => 'seržant',
            ],
            [
                'id' => 3,
                'name' => 'uly seržant',
            ],
            [
                'id' => 4,
                'name' => 'starşina',
            ],
            [
                'id' => 5,
                'name' => 'kiçi leýtenant',
            ],
            [
                'id' => 6,
                'name' => 'leýtenant',
            ],
            [
                'id' => 7,
                'name' => 'uly leýtenant',
            ],
            [
                'id' => 8,
                'name' => 'kapitan',
            ],
            [
                'id' => 9,
                'name' => 'maýor',
            ],
            [
                'id' => 10,
                'name' => 'podpolkownik',
            ],
            [
                'id' => 11,
                'name' => 'polkownik',
            ],
            [
                'id' => 12,
                'name' => 'general-maýor',
            ],
            [
                'id' => 13,
                'name' => 'general-leýtenant',
            ],
            [
                'id' => 14,
                'name' => 'general-polkownik',
            ],

        ]);

        DB::table('nationalities')->insert([
            [
                'name' => 'türkmen',
            ],
            [
                'name' => 'rus',
            ],
            [
                'name' => 'özbek',
            ],
            [
                'name' => 'tatar',
            ],
            [
                'name' => 'gazak',
            ],
            [
                'name' => 'ermeni',
            ],
            [
                'name' => 'azerbeýjan',
            ],

        ]);
        DB::table('faculties')->insert([
            [
                'id' => 1,
                'slug' => '1y5U9Or5t',
                'name' => 'Ykdysadyýet',
            ],
            [
                'id' => 2,
                'slug' => '6y5p9Oo5t',
                'name' => 'Maliýe',
            ],
        ]);

        DB::table('kathedras')->insert([
            [
                'id' => 1,
                'slug' => '5y5p9Orqt',
                'name' => 'Kompýuter tehnologiýalary',
                'faculty_id' => 1,
            ],
            [
                'id' => 2,
                'slug' => '4k5UyOr5n',
                'name' => 'Maglumaty goramak',
                'faculty_id' => 2,
            ],
        ]);

        $battalions = array(1,2,3,4,5);
        foreach($battalions as $battalion){
            DB::table('battalions')->insert([
                [
                    'number' => $battalion,
                ]
            ]);
        };

        DB::table('rotas')->insert([
            [
                'id' => '1',
                'number' => 1,
                'battalion_id' => 1,
            ],
            [
                'id' => '2',
                'number' => 2,
                'battalion_id' => 1,
            ],
            [
                'id' => '3',
                'number' => 3,
                'battalion_id' => 1,
            ],
            [
                'id' => '4',
                'number' => 4,
                'battalion_id' => 1,
            ],
            [
                'id' => '5',
                'number' => 5,
                'battalion_id' => 1,
            ],
            [
                'id' => '6',
                'number' => 6,
                'battalion_id' => 1,
            ],
            [
                'id' => '7',
                'number' => 7,
                'battalion_id' => 1,
            ],
            [
                'id' => '8',
                'number' => 8,
                'battalion_id' => 1,
            ],
            [
                'id' => '9',
                'number' => 9,
                'battalion_id' => 1,
            ],
            [
                'id' => '10',
                'number' => 10,
                'battalion_id' => 1,
            ],
            [
                'id' => '11',
                'number' => 11,
                'battalion_id' => 1,
            ],
            [
                'id' => '12',
                'number' => 12,
                'battalion_id' => 1,
            ],
            [
                'id' => '13',
                'number' => 13,
                'battalion_id' => 1,
            ],
            [
                'id' => '14',
                'number' => 14,
                'battalion_id' => 1,
            ],
            [
                'id' => '15',
                'number' => 15,
                'battalion_id' => 1,
            ],
            [
                'id' => '16',
                'number' => 16,
                'battalion_id' => 1,
            ],
            [
                'id' => '17',
                'number' => 17,
                'battalion_id' => 1,
            ],
            [
                'id' => '18',
                'number' => 18,
                'battalion_id' => 1,
            ],
            [
                'id' => '19',
                'number' => 19,
                'battalion_id' => 1,
            ],
            [
                'id' => '20',
                'number' => 20,
                'battalion_id' => 1,
            ],
        ]);

        DB::table('platoons')->insert([
            [
                'id' => 1,
                'number' => 1,
                'rota_id' => 1,
            ],
            [
                'id' => 2,
                'number' => 2,
                'rota_id' => 1,
            ],
            [
                'id' => 3,
                'number' => 3,
                'rota_id' => 1,
            ]
        ]);

        DB::table('services')->insert([
            [
                'id' => 1,
                'name' => "Aragatnaşyk gullugy",
            ],
            [
                'id' => 2,
                'number' => "Nyzam gullugy",
            ],
        ]);

        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => "admin",
            ],
            [
                'id' => 2,
                'name' => "operator",
            ]
        ]);
        DB::table('users')->insert([
            [
                'id' => 1,
                'first_name' => "Rejep",
                'last_name' => "Rejepow",
                'login' => "admin",
                'password' => '$2y$10$WfKG.H5L7uZsezhPkR/qJuv/.nYFeV7f4jgD8Z/KVW1BLrRjo5N.C',
                'status' => 1,
                'role_id' => 1,
            ]
        ]);

        factory(App\Number::class, 5000)->create();
    }
}
