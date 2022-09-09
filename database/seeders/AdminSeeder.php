<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
            [ 'email' => 'admin@manakal.com','password'=> bcrypt('12345678'),'first_name'=>'Super','last_name' => 'Admin', 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ],
        ));

    }
}
