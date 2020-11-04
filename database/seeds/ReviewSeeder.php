<?php

use Illuminate\Database\Seeder;
Use \Carbon\Carbon;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i <1000 ; $i++) { 
        	# code...
	        DB::table('reviews')->insert([
	            'user_id' => rand(1,50),
	            'room_id' => rand(1,150),
	            'content' => Str::random(150),
                'created_at' => date("Y-m-d H:i:s"),
            ]);
        };
    }
}
