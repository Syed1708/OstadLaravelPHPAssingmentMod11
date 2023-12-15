<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $today = now()->format('Y-m-d');
        $yesterday = now()->subDay()->format('Y-m-d');
        $startOfMonth = now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = now()->endOfMonth()->format('Y-m-d'); 
    
        $totalToday = $this->calculateTotalSales($today, $today);
        $totalYesterday = $this->calculateTotalSales($yesterday, $yesterday);
        $totalThisMonth = $this->calculateTotalSales($startOfMonth, $endOfMonth); 
        $totalLastMonth = $this->calculateTotalSales(now()->subMonth()->startOfMonth()->format('Y-m-d'), now()->subMonth()->endOfMonth()->format('Y-m-d'));
    
        return view('dashboard', compact('totalToday', 'totalYesterday', 'totalThisMonth', 'totalLastMonth'));
    }
    
    protected function calculateTotalSales($startDate, $endDate)
    {
        return Sale::whereHas('transaction', function ($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        })->sum('total_sales_amount');
    }

    

}
