<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Product::create([
                'name' => $faker->word,
                'quantity' => $faker->numberBetween(10, 100),
                'price' => $faker->randomFloat(2, 10, 100),
                'desc' => $faker->sentence(2),
            ]);
        }

                // // or
                
                // for($i=0; $i<10; $i++){
                //     $faker = Faker::create();
                //     product = new Product;
                //     product->id = $i + 1;
                //     product->quantity = $faker->numberBetween(1,100);
                //     product->price = $faker->randomFloat(2, 10, 100);
                //     product->save();
        
                // }
    }
}
