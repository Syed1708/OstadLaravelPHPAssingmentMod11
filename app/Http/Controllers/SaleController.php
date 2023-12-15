<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function index()
    {
        //display Sales list

        // $Sales = Sale::orderBy('name','asc')->paginate(5);
        // $Sales = Sale::latest()->paginate(5);
        // we have a relation with product table
        // and i like retrive some data from product table 
        // so query will be change
        // now we can access products data also
        $sales = Sale::with('product')->latest()->paginate(5);

        return view('sales.index', compact('sales'));
        // dd($sales);
       
    }

  

    public function create()
    {
        //create a view for add Sale
        // $productNames = Product::pluck('name', 'id');
        // dd($productNames);
        // $productPrices = Product::pluck('price', 'id');
        // $productQuantities = Product::pluck('quantity', 'id');
    
        // return view('sales.create', compact('productNames', 'productPrices', 'productQuantities'));

        // $transactions = Transaction::all();
        $products = Product::all();
        // dd($transactions);

        return view('sales.create', compact('products'));
    }

    // public function fetchProductInfo($productId)
    // {
    //     $product = Product::findOrFail($productId);
    
    //     return response()->json([
    //         'price' => $product->price,
    //         'available_quantity' => $product->quantity, // Assuming you have a 'quantity' column in your products table
    //     ]);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity_sold' => 'required|integer|min:1',
            'sale_price' => 'required|numeric',
            'sale_date' => 'required|date',
        ]);

        Sale::create([
            'product_id' => $request->input('product_id'),
            'sale_date' => $request->input('sale_date'),
            'quantity_sold' => $request->input('quantity_sold'),
            'sale_price' => $request->input('sale_price'),

        ]);

        return redirect()->route('sales.index')->with('success', 'Sale added successfully.');
    }


    public function show($id)
    {
        //
        // display Sale against specifiq id
        $sale = Sale::with('product')->findOrFail($id);
        
        
        // dd($Sales);
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        // $sale = Sale::get()->findOrFail($id);
        $sale = Sale::with('product')->findOrFail($id);
        $products = Product::all(); 
        // dd($Sale);
        return view('sales.edit', compact('sale','products'));
    }


    public function update(Request $request, Sale $Sale)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity_sold' => 'required|integer|min:1',
            'sale_price' => 'required|numeric',
            'sale_date' => 'required|date',
        ]);

        $Sale->update([
            'product_id' => $request->input('product_id'),
            'sale_date' => $request->input('sale_date'),
            'quantity_sold' => $request->input('quantity_sold'),
            'sale_price' => $request->input('sale_price'),

        ]);

        return redirect()->route('sales.index')->with('success', 'Sale Updated successfully.');

    }

    // public function destroy(Sale $Sale)
    public function destroy($id)
    {
        //
        // $Sale->delete();
        // or
        Sale::find($id)->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully!');
    }
    
}
