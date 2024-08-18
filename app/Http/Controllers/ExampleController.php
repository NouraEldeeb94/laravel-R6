<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Student;
use App\Models\Car;
use App\Models\Category;
use Faker\Guesser\Name;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class ExampleController extends Controller
{
    //
    function uploadform() {

        return view('upload');
    }

    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }

    // public function index() {

    //     return view('index');
    // }
    // public function index() {

    //         return view('allproducts');
    //     }

    public function about() {

                return view('about');
            }

            public function product() {

                
                $products = product::get();

                return view('all_products', compact('products'));
            }


    public function test() {
        dd(Student::find(1)?->phone);

}

public function car() {
    $cars = car::find(1);

// return $cars->category;
// return $cars = car::with(relations:'category')->find(1);

return $cars->category;

}

public function add() {
    $cars = Car::select('category_name')->get();
    return view('add_car', compact('cars'));

// return $cars->category;
// return $cars = car::with(relations:'category')->find(1);
}

public function cat(string $id)
    {
        $car = Car::find($id);
    //    $categories = $car->categories;
       return view('edit_car', compact('categories'));
    }


    
    public function contact() {
        return view('contact_us');

}

public function send() {
   $data = request()->validate([
        'name' => 'required|string|max:30',
        'email' => 'required|email|max:50',
        'subject' => 'required|string|max:80',
        'message' => 'required|string|max:100',
    ]);

    
Mail::to(request('email'))->send(new OrderShipped($data));
return back();

   

    
}



}