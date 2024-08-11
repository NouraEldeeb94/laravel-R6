<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\Common;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use Common;

    public function index()
    {
        $products = product::latest()->limit(3)->get();

        return view('index', compact('products'));
    }

   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric|min:100',
            'description' => 'required|string|max:1000',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',

        ]);

        $data['image'] = $this->uploadfile($request->image, 'assets/images');
        $data['published'] = isset($request->published);

        Product::create($data);
        return redirect()->route('fashion_index ');
        // dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::findOrFail($id);
        return view('products', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $product = Product::findOrFail($id);
        return view('edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric|min:100',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',

        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadfile($request->image, 'assets/images');
        }

        $data['published'] = isset($request->published);

        Product::where('id', $id)->update($data);

        return redirect()->route('fashion_index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
