<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Almir',
                'email' => 'almir@almir.ba',
                'role_id' => 1,
                'password' => '$2y$10$BOBS2HQKnVsLIkToxC3gZOsyUwM17s3bJ6lo38LRu1cRBddT.rhnC', // 12345678                
            ],
            [
                'name' => 'Moamer',
                'email' => 'moamer@moamer.ba',
                'role_id' => 2,
                'password' => '$2y$10$BOBS2HQKnVsLIkToxC3gZOsyUwM17s3bJ6lo38LRu1cRBddT.rhnC', // 12345678                
            ],
            [
                'name' => 'Edna',
                'email' => 'edna@edna.ba',
                'role_id' => 3,
                'password' => '$2y$10$BOBS2HQKnVsLIkToxC3gZOsyUwM17s3bJ6lo38LRu1cRBddT.rhnC', // 12345678                
            ],
            [
                'name' => 'Naida',
                'email' => 'naida@naida.ba',
                'role_id' => 4,
                'password' => '$2y$10$BOBS2HQKnVsLIkToxC3gZOsyUwM17s3bJ6lo38LRu1cRBddT.rhnC', // 12345678                
            ],
            [
                'name' => 'Selma',
                'email' => 'selma@selma.ba',
                'role_id' => 5,
                'password' => '$2y$10$BOBS2HQKnVsLIkToxC3gZOsyUwM17s3bJ6lo38LRu1cRBddT.rhnC', // 12345678                
            ],
            [
                'name' => 'Adem',
                'email' => 'adem@adem.ba',
                'role_id' => 2,
                'password' => '$2y$10$BOBS2HQKnVsLIkToxC3gZOsyUwM17s3bJ6lo38LRu1cRBddT.rhnC', // 12345678                
            ],
            [
                'name' => 'Harun',
                'email' => 'harun@harun.ba',
                'role_id' => 3,
                'password' => '$2y$10$BOBS2HQKnVsLIkToxC3gZOsyUwM17s3bJ6lo38LRu1cRBddT.rhnC', // 12345678                
            ],
            [
                'name' => 'AlmirB',
                'email' => 'almirb@almirb.ba',
                'role_id' => 4,
                'password' => '$2y$10$BOBS2HQKnVsLIkToxC3gZOsyUwM17s3bJ6lo38LRu1cRBddT.rhnC', // 12345678                
            ],
        ]);
    }
}
