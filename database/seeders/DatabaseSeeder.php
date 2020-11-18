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
        // \App\Models\User::factory(10)->create();
        $this->call(VendorSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(TypesSeeder::class);
        $this->call(ServiceVendorSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
