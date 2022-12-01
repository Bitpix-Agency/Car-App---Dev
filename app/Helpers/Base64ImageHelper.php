<?php


namespace App\Helpers;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Str;

class Base64ImageHelper
{
    /**
     * @param string $imageRequest
     * @param string $path
     * @return string
     */
    public function saveImage(string $imageRequest, string $path): string
    {
        $image_64 = $imageRequest; //your base64 encoded data

        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        // find substring fro replace here eg: data:image/png;base64,
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10) . '.' . $extension;
        Storage::disk('spaces')->put($path, base64_decode($image), 'public');

        return Storage::disk('spaces')->url($path);
    }
}
