<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert(array(
            [ 'name' => 'Breakfast', 'icon'=> 'coffee','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Launch', 'icon'=> 'cutlery','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Dinner', 'icon'=> 'glass','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'AC', 'icon'=> 'snowflake-o','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'WiFi', 'icon'=> 'wifi','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Pool', 'icon'=> 'tint','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Parking', 'icon'=> 'car','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Spa', 'icon'=> 'pagelines','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Disabled person support', 'icon'=> 'blind','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Custom Events', 'icon'=> 'birthday-cake','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Bar', 'icon'=> 'beer','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => '24 Hour security', 'icon'=> 'shield','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => '24 public CCTV', 'icon'=> 'camera','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Sunset', 'icon'=> 'sun-o','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Camping', 'icon'=> 'free-code-camp','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
            [ 'name' => 'Meeting rooms', 'icon'=> 'briefcase','created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
        ));
    }
}
