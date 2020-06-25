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
    
    public function getSpotsJson($spots){
        $spots_json = json_encode($spots, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_UNESCAPED_UNICODE);
        $spots_json = str_replace('\n','',$spots_json);
        return $spots_json;
    }
    
}