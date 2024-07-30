<?php

namespace App\Http\Controllers;

use App\Models\Class1;
use Illuminate\Http\Request;

class Classcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $classes = Class1::get();

        return view('classes', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        // $class_name = 'english';
        // $price = 10;
        // $description = "hello my new language";
        // $capacity = 10;
        // $is_fulled = true;
        // $time_from = 12;
        // $time_to = 1;

        $data = [
            'classname' => $request->classname,
            'price' => $request->price,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'is_fulled' => isset($request->is_fulled),
            // 'time_from' => $request->time_from,
            // 'time_to' => $request->time_to,

        ];

        Class1::create($data);

        return redirect()->route('class_index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $class = Class1::findOrFail($id);
        return view('class_details', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $class = Class1::findOrFail($id);
        return view('edit_class', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($request, $id);
        $data = [
            'classname' => $request->classname,
            'price' => $request->price,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'is_fulled' => isset($request->is_fulled),
            // 'time_from' => $request->time_from,
            // 'time_to' => $request->time_to,

        ];

        Class1::where('id', $id)->update($data);

        return redirect()->route('class_index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        // Class1::where('id', $id)->delete();
        // return "data_deleted";

        $id = $request->id;

        Class1::where('id', $id)->delete();

        return redirect()->route('class_index');
    }

        public function showDeleted() {

           $classes = Class1::onlyTrashed()->get();
           
           return view('trashed_classes', compact('classes'));
        }

    }

