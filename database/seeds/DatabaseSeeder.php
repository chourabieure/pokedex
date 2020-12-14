<?php

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
        $this->call(UserSeeder::class);
        $this->call(PokedexSeeder::class);
        $this->call(EvolutionsSeeder::class);
        $this->call(StatsSeeder::class);
        $this->call(WeaknessesSeeder::class);
        $this->call(TypesSeeder::class);
    }
}
