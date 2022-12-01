<?php

namespace Database\Seeders;

use App\Models\MembershipType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MembershipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MembershipType::updateOrCreate(
            [
                'name' => 'Normal'
            ],
            [
                'name' => 'Normal',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        MembershipType::updateOrCreate(
            [
                'name' => 'Agency'
            ],
            [
                'name' => 'Agency',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
