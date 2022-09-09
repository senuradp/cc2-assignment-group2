<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beds')->insert(array(
            [ 'name' => 'Crib', 'width' => 28,'length'=> 52,'default_capacity'=> 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Rollaway / Extra', 'width' => 39,'length'=> 75,'default_capacity'=> 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Modern Cot', 'width' => 30,'length'=> 74,'default_capacity'=> 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Twin Bed', 'width' => 39,'length'=> 76,'default_capacity'=> 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Standard Double', 'width' => 54,'length'=> 76,'default_capacity'=> 2,'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Queen Bed', 'width' => 60,'length'=> 80,'default_capacity'=> 2,'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Olympic Queen', 'width' => 66,'length'=> 80,'default_capacity'=> 2,'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'King Bed', 'width' => 78,'length'=> 80,'default_capacity'=> 2,'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Super King', 'width' => 76,'length'=> 80,'default_capacity'=> 2,'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Grand King', 'width' => 80,'length'=> 98,'default_capacity'=> 2,'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
        ));
    }
}
