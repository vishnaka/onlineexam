<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ServiceVendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_vendor')->insert(
            [
            'vendor_id' => 1,
            'service_id' =>1
            ]
        );

        DB::table('service_vendor')->insert(
            [
            'vendor_id' => 1,
            'service_id' =>2
            ]
        );

        DB::table('service_vendor')->insert(
            [
            'vendor_id' => 2,
            'service_id' =>2
            ]
        );

        DB::table('service_vendor')->insert(
            [
            'vendor_id' => 2,
            'service_id' =>3
            ]
        );

        DB::table('service_vendor')->insert(
            [
            'vendor_id' => 3,
            'service_id' =>1
            ]
        );

        DB::table('service_vendor')->insert(
            [
            'vendor_id' => 3,
            'service_id' =>2
            ]
        );

        DB::table('service_vendor')->insert(
            [
            'vendor_id' => 3,
            'service_id' =>3
            ]
        );
    }
}
