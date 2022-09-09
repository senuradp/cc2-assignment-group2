<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotel_types')->insert(array(
            [ 'name' => 'Chain hotels', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Motels', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Resorts', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Inns', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'All-suites', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Conference', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Extended', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Boutique', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Bunkhouses', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Bed and breakfasts', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Eco', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Casino', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Pop-up', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Pet-friendly', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Roadhouses', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Gastro', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Micro', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Transit', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Heritage', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Hostels', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Bungalow', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Villa', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
        ));
    }
}
