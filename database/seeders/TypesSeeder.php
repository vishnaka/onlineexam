<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(
            [
            'description' => '500 - 1000 square feet',
            'duration_hrs' => 1,
            'price_hrs' => 200,
            'service_id' => 1
            ]           
        );
        Type::create(
            [
            'description' => '1000 - 2000 square feet',
            'duration_hrs' => 2,
            'price_hrs' => 250,
            'service_id' => 1
            ]           
        );
        Type::create(
            [
            'description' => '2000 - 3000 square feet',
            'duration_hrs' => 3,
            'price_hrs' => 300,
            'service_id' => 1
            ]           
        );

        Type::create(
            [
            'description' => '500 - 1000 square feet',
            'duration_hrs' => 1,
            'price_hrs' => 150,
            'service_id' => 2
            ]           
        );

        Type::create(
            [
            'description' => '1000 - 2000 square feet',
            'duration_hrs' => 2,
            'price_hrs' => 200,
            'service_id' => 2
            ]           
        );

        Type::create(
            [
            'description' => '10 - 20 hieght meter',
            'duration_hrs' => 1,
            'price_hrs' => 250,
            'service_id' => 3
            ]           
        );

        Type::create(
            [
            'description' => '10 - 20 hieght meter',
            'duration_hrs' => 2,
            'price_hrs' => 350,
            'service_id' => 3
            ]           
        );
    }
}
