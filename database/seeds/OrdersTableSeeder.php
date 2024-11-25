<?php

use Illuminate\Database\Seeder;
use App\Order;
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		/*
		//faker
        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 20; $i++) {
            Order::create([
                'cust_id' => $faker->randomDigit,
                'address' => $faker->sentence,
                'city' => $faker->city,
                'state' => $faker->sentence,
                'zip' => $faker->postcode,
                'phn_no' => $faker->phonenumber,
                'items' => $faker->sentence,
            ]);
        }
		*/
		
		DB::table('orders')->delete();
		$json = File::get("database/data/order.json");
		$data = json_decode($json);
		foreach($data as $object)
		{
			
			Order::create(array(
			'cust_id' => $object->customer_id,
			'address' => $object->address,
			'city' => $object->city,
			'state' => $object->state,
			'zip' => $object->zip,
			'phn_no' => $object->phone,
			'items' => implode('|',$object->items)
			
			));
		}
		
    }
}
