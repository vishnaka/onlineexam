<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create(
            [
            'name' => 'Landscaping Service'
            ]           
            );

            Service::create(
                [
                    'name' => 'Lawn Mower Service'
                ]
                ); 
            Service::create(
                [
                    'name' => 'Tree Expert Service'
                ]
            );       
    }
}
