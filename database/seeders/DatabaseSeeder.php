<?php

namespace Database\Seeders;

use App\Domains\Games\Seeders\AvatarSeeder;
use App\Domains\Games\Seeders\GameSeeder;
use App\Domains\Missions\Seeders\MissionsSeeder;
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
        $this->call(MissionsSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(AvatarSeeder::class);
    }
}
