<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        //display products list

        // $products = Product::orderBy('name','asc')->paginate(5);
        $products = Product::latest()->paginate(5);
        // dd($products);
        return view('products.index')->with('products', $products); 
        // return view('products.index', compact('products'));
    }


    public function create()
    {
        //create a view for add product
     
        return view('products.create'); 
      
    }


    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer',],
            'price' => ['required', 'integer',],
            'desc' => ['required', 'string'],
            
        ]);

        // if pass all validation then create a new product
        $product = Product::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'desc' => $request->desc
        ]);

        // then return to the product list page i mean products.index route

        return redirect()->route('products.index')->with('success', 'Product added successfully!');

    }


    public function show($id)
    {
        //
        // display product against specifiq id
        $product = Product::latest()->find($id);
        // dd($products);
        return view('products.show')->with('product', $product); 
        // return view('products.index', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::latest()->find($id);;
        // dd($product);
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        //
                //validation
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'quantity' => ['required', 'integer',],
                    'price' => ['required', 'integer',],
                    'desc' => ['required', 'string'],
                    
                ]);
        
                // if pass all validation then create a new product
                $product->update([
                    'name' => $request->name,
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                    'desc' => $request->desc
                ]);
        

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // public function destroy(Product $product)
    public function destroy($id)
    {
        //
        // $product->delete();
        // or
        Product::find($id)->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
    
}
