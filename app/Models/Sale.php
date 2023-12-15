<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'sale_date', 'quantity_sold', 'sale_price', 'total_sales_amount'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sale) {
            $sale->total_sales_amount = $sale->sale_price * $sale->quantity_sold;
            $transaction = $sale->transaction()->create(['date' => $sale->sale_date]);
            $sale->transaction_id = $transaction->id;
        });

        static::updating(function ($sale) {
            $sale->total_sales_amount = $sale->sale_price * $sale->quantity_sold;
           
            // Update the related transaction date
            if ($sale->transaction) {
                $sale->transaction->update(['date' => $sale->sale_date]);
            }
        });
    }
}
