<?php

use Illuminate\Database\Seeder;

class ecommSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ecomm::class, 5)->create();
    }
}
