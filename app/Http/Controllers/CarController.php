<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Traits\Common;
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
        $categories = Category::all();
        return view('add_car', compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric|min:100',
            'category_name' => 'nullable|exists:categories,id',
            'description' => 'nullable|string|max:1000',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',

        ]);

        $data['image'] = $this->uploadfile($request->image, 'assets/images/cars');
        $data['published'] = isset($request->published);

        Car::create($data);
        return redirect()->route('car_index');
        // dd($data);

        // $cars->categories()->create($data);

        // return redirect('cars')->with('success', 'Ticket Successfully Created for Flight ' . $car->catewgory_name);
        // return 'Uploaded';
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
        $car = Car::findOrFail($id);
        return view('edit_car', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric|min:100',
            'category_name' => 'nullable|exists:categories,id',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',

        ]);

        // dd($data);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadfile($request->image, 'assets/images/cars');
        }

        $data['published'] = isset($request->published);

        Car::where('id', $id)->update($data);

        return redirect()->route('car_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
