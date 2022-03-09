<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create(
            [
                'name' => 'Álvaro',
                'email' => 'a_rsc@hotmail.com',
                'password' => bcrypt('password')
            ]
        );
        \App\Models\User::factory()->create(
            [
                'name' => 'Belén',
                'email' => 'belen@hotmail.com',
                'password' => bcrypt('password')
            ]
        );

        \App\Models\Category::factory(20)->create();
        \App\Models\Project::factory(10)->create();
    }
}
