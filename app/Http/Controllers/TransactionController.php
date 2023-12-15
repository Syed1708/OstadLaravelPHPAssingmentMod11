<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index()
{
    // Fetch all transactions with associated sales and products
    $transactions = Transaction::with('sales.product')->get();

    // Calculate total sales amount for each transaction
    foreach ($transactions as $transaction) {
        $transaction->totalSalesAmount = $transaction->sales->sum('total_sales_amount');
    }

    return view('transactions.index', compact('transactions'));
}

}


