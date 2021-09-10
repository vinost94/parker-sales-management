<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SalesTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SalesTeam::factory(50)->create();
    }
}
