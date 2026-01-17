<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('devices')->delete();

        DB::table('devices')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'GentleLase Pro®',
                    'summary' => 'summary device',
                    'avatar' => 'device1.webp',
                    'status' => 'active',
                    'created_at' => '2016-05-29 10:10:07',
                    'updated_at' => '2016-05-29 10:10:07',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'GentleMax Pro®',
                    'summary' => 'summary device',
                    'avatar' => 'device2.png',
                    'status' => 'active',
                    'created_at' => '2016-05-29 10:10:07',
                    'updated_at' => '2016-05-29 10:10:07',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'GentleMax Pro Plus®',
                    'summary' => 'summary device',
                    'avatar' => 'device3.png',
                    'status' => 'active',
                    'created_at' => '2016-05-29 10:10:07',
                    'updated_at' => '2016-05-29 10:10:07',
                )
        ));
    }
}
