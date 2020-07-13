<?php

use Illuminate\Database\Seeder;

class InquiriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
    	foreach (range(1,100) as $index) {
	        DB::table('inquiries')->insert([
	            'from_id' => $faker->biasedNumberBetween(4,5),
	            'to_id' => $faker->biasedNumberBetween(6,7),
	            'content' => '{"message":"'.$faker->paragraph(10).'"}',
	            'product_details' => '{
                    "id":"'.$faker->biasedNumberBetween(1,30).'",
                    "title": "'.$faker->words(3, true).'",
                    "slug": "'.$faker->slug.'",
                    "description": "'.$faker->sentence.'",
                    "featured_image":"img/product/basmati-rice.jpg",
                    "price": "'.$faker->randomNumber(2).'",
                    "sale_price":null,
                    "user_id":3,
                    "user":{
                        "id":3,
                        "name": "'.$faker->email.'",
                        "email": "'.$faker->email.'",
                        "phone": "'.$faker->e164PhoneNumber.'",
                        "approved_seller":1
                    }
                }',
	            'read' => 0,
                'created_at' => $faker->dateTimeBetween('-2 years', 'now')
	        ]);
	    }
    }
}