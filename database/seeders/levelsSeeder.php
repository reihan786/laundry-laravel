<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\levels;

class levelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // insert intoo
        $levels =[
            [
                'name'=> 'Administrator'
            ],
            [
                'name'=> 'Operator'
            ],
            [
                'name'=> 'Leader'
            ],

        ];

        levels::insert($levels);
    }
}
