<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HandleUploadImage {

    public static function upload($request, $fieldName, $dir) {
        if($request->hasFile($fieldName)) {
            $date = new \DateTime('now');
            $file = $request->file($fieldName);
            $fileNameHash = $date->format('d-M-Y-h-i') . '-' . $file->getClientOriginalName();
            $filePath = $request->file($fieldName)->storeAs('public/'.$dir.'/'.Auth::id(), $fileNameHash);
            return Storage::url($filePath);
        }
        return null;
    }
}
