<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::create(
            [
            'name' => 'Heshan A',
            'email' => 'heshan@gmail.com',
            ]           
            );

            Vendor::create(
                [
                    'name' => 'Amila T',
                    'email' => 'amila@gmail.com',
                ]
                ); 
            Vendor::create(
                [
                    'name' => 'Sampath W',
                    'email' => 'sampath@gmail.com',
                ]
            );          
    }
}
