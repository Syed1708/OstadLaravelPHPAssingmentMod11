<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('quantity')->default(0);
            $table->decimal('price', 8, 2);
            $table->longText('desc');

            $table->timestamps();
        });
        
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('product_id')->constrained()->onDelete('cascade');
            // $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade'); // Define the foreign key relationship
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity_sold');
            $table->decimal('sale_price', 8, 2);
            $table->date('sale_date');
            $table->decimal('total_sales_amount', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('products');
        
        
    }
};
