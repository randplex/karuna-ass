<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();
    
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
    
        $products = $query->paginate(10);
    
        return view('products.index', compact('products'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'published' => 'required|boolean',
    ]);

    Product::create($validatedData);

    return redirect()->route('products.index')->with('status', 'Product created successfully!');
    }


    /**
     * Display the specified resource.
     */

    public function show( $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Fetch the product using the provided ID
        $product = Product::findOrFail($id);
    
        // Pass the product to the view
        return view('products.form', compact('product'));
    }
    

    public function update(Request $request, Product $product)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'published' => 'required|boolean',
    ]);

    $product->update($validatedData);

    return redirect()->route('products.index')->with('status', 'Product updated successfully!');
    }


    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')->with('status', 'Product deleted successfully!');
    }
    

    public function publish(Product $product)
    {
        $product->update(['published' => !$product->published]);
        return redirect()->route('products.index')->with('status', 'Product status updated successfully!');
    }
    
}
