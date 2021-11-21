<?php

namespace App\Components\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{

    public static function getImageUrlToSaving($uploadImage): string
    {
        $image_url = '';
        if ($uploadImage) {
            $path = Storage::disk('uploads')->putFile('images/news', $uploadImage);
            $image_url = Storage::disk('uploads')->url($path);
        }
        return $image_url;
    }

}
