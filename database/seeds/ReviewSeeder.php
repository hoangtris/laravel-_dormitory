<?php

use Illuminate\Database\Seeder;


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
	            'user_id' => rand(1,60),
	            'room_id' => rand(1,450),
	            'content' => 'Phong dep lam nha cac ban',
                'created_at' => date("Y-m-d H:i:s"),
            ]);
        };
    }
}
