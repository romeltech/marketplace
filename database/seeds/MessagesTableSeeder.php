<?php
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
    	foreach (range(1,50) as $index) {
	        DB::table('messages')->insert([
	            'full_name' => $faker->name,
	            'email' => $faker->email,
	            'phone' => $faker->e164PhoneNumber,
	            'subject' => $faker->sentence,
                'message' => $faker->paragraph,
                'created_at' => $faker->dateTimeBetween('-2 years', 'now')
	        ]);
	    }
    }
}
