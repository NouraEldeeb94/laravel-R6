<?php

namespace App\Http\Controllers;

use App\Models\Class1;
use App\Traits\Common;
use Illuminate\Http\Request;

class Classcontroller extends Controller
{
    use Common;

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
        $data = $request->validate([
            'classname' => 'required|string',
            'price' => 'required|numeric|min:100',
            'description' => 'required|string|max:1000',
            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i|after:time_start',
            'capacity' => 'required|integer|min:5',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',

        ]);

        $data['image'] = $this->uploadfile($request->image, 'assets/images');
        $data['is_fulled'] = isset($request->is_fulled);

        Class1::create($data);
        return redirect()->route('class_index');
        // dd($data);

        return 'Uploaded';
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
        $data = $request->validate([
            'classname' => 'required|string',
            'price' => 'required|numeric|min:100',
            'description' => 'required|string|max:1000',
            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i|after:time_start',
            'capacity' => 'required|integer|min:5',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',

        ]);

        // dd($data);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadfile($request->image, 'assets/images');
        }

        $data['is_fulled'] = isset($request->is_fulled);

        Class1::where('id', $id)->update($data);

        return redirect()->route('class_index');

        // dd($request, $id);
        // $data = [
        //     'classname' => $request->classname,
        //     'price' => $request->price,
        //     'description' => $request->description,
        //     'time_from' => $request->time_from,
        //     'time_to' => $request->time_to,
        //     'capacity' => $request->capacity,
        //     'is_fulled' => isset($request->is_fulled),
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

    public function showDeleted()
    {

        $classes = Class1::onlyTrashed()->get();

        return view('trashed_classes', compact('classes'));
    }

    public function restore(string $id)
    {

        Class1::where('id', $id)->restore();
        return redirect()->route('class_index');

    }

    public function forcedelete(string $id)
    {

        Class1::where('id', $id)->forceDelete();
        return redirect()->route('class_index');

    }

}
