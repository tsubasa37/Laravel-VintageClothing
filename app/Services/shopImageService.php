<?php

namespace App\Services;

Use InterventionImage;
Use Illuminate\Support\Facades\Storage;


Class shopImageService
{
    public static function upload1($imageFile1, $folderName)
    {
        // dd($imageFile);
        $file1 = $imageFile1;
        $fileName = uniqid(rand().'_');
        $extension = $file1->extension();
        $image1 = $fileName. '.' . $extension;
        $resizedImage = InterventionImage::make($file1)->resize(1920,1080)->encode();
        Storage::put('public/' . $folderName . '/' . $image1,
        $resizedImage );
        return $image1;
    }
    public static function upload2($imageFile2, $folderName)
    {
        // dd($imageFile);
        $file2 = $imageFile2;
        // dd($file2);
        $fileName = uniqid(rand().'_');
        $extension = $file2->extension();
        $image2 = $fileName. '.' . $extension;
        $resizedImage = InterventionImage::make($file2)->resize(1920,1080)->encode();
        Storage::put('public/' . $folderName . '/' . $image2,
        $resizedImage );
        return $image2;
    }
    public static function upload3($imageFile3, $folderName)
    {
        // dd($imageFile);
        $file3 = $imageFile3;
        $fileName = uniqid(rand().'_');
        $extension = $file3->extension();
        $image3 = $fileName. '.' . $extension;
        $resizedImage = InterventionImage::make($file3)->resize(1920,1080)->encode();
        Storage::put('public/' . $folderName . '/' . $image3,
        $resizedImage );
        return $image3;
    }
}
