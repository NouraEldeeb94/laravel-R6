<?php

namespace App\Traits;

    
trait Common {

    public function uploadfile($file, $path){
        $file_extension = $file->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $file->move($path, $file_name);

       return $file_name;
    }

}