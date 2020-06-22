<?php

namespace App\Services;

class FunctionService {

public function saveImage($image){
      if( isset($image) === true ){
          $filename = $this->getAvailableFileName($image);

          $path = $image->storeAs('photos', $filename, 'public');

          return $filename;
      }
      return '';
    }

    private function getAvailableFileName($image){
        $ext = $image->guessExtension();

        $filename = \Str::random(20) . '.' . $ext;

        while (\File::exists(asset('storage/photos/' . $filename))){
          $filename = \Str::random(20) . '.' . $ext;
        }

        return $filename;
    }
    
}