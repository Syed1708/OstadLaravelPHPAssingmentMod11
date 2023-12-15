<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            
            $product = Product::inRandomOrder()->first(); // Get a random product
           
            $transaction = Transaction::inRandomOrder()->first(); // Get a random product
            $sale = Sale::inRandomOrder()->first(); // Get a random product

            Sale::create([
                'product_id' => $product->id,
                'transaction_id' => $transaction->id,
                'quantity_sold' => $faker->numberBetween(1, $sale->quantity_sold),
                'sale_price' => $faker->numberBetween(1, $sale->sale_price),
                'total_sales_amount' => $faker->randomFloat(2, 10, 100),
            ]);
        }

    }
}
