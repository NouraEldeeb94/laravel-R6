<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;
use App\Models\Car;
use App\Models\Category;

class CarController extends Controller
{
    use Common;
     
    public function index()
    {
        $cars = Car::get();

        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'category_name')->get();
        // dd($categories);
        return view('add_car', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'car_title' => 'required|string',
            'price' => 'required|numeric|min:100',
            'description' => 'required|string|max:1000',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',

        ]);

        $data['image'] = $this->uploadfile($request->image, 'assets/images/cars');
        $data['published'] = isset($request->published);
    

        Car::create($data);
        return redirect()->route('cars')->with('content', 'Car added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
