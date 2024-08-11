<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

                return view('all_products');
            }

    
}

