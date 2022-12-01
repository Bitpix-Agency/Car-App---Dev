<?php

namespace Database\Seeders;

use App\Models\FuelType;
use App\Models\MembershipType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuelType::updateOrCreate(
            [
                'name' => strtoupper('Petrol')
            ],
            [
                'name' => strtoupper('Petrol'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        FuelType::updateOrCreate(
            [
                'name' => strtoupper('Diesel')
            ],
            [
                'name' => strtoupper('Diesel'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        FuelType::updateOrCreate(
            [
                'name' => strtoupper('Electric')
            ],
            [
                'name' => strtoupper('Electric'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
