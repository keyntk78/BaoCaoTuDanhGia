<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HandleUploadFile
{
    public static function upload($request, $fieldName, $dir) {
        if($request->hasFile($fieldName)) {
            $date = new \DateTime('now');
            $file = $request->file($fieldName);
            $fileNameHash = $date->format('d-M-Y-h-i') . '-' . $file->getClientOriginalName();
            $filePath = $request->file($fieldName)->storeAs('public/'.$dir.'/', $fileNameHash);
//            return Storage::url($filePath);
            return  $fileNameHash;
        }
        return null;
    }
}
