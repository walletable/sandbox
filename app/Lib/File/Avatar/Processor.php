<?php


namespace App\Lib\File\Avatar;

use Image;

class Processor
{
    

    public static function calculateSquare($width, $height)
    {

        if ($height > $width) {
            $l2 = $height;
            $l1 = $width;
        } else {
            $l2 = $width;
            $l1 = $height;
        }

        $cod = floor(($l2 - $l1)/2);

        $data = [
            'width' => $l1,
            'height' => $l1,
        ];



        if ($height > $width) {
            $data['x'] = 0;
            $data['y'] = $cod;
        } else {
            $data['x'] = $cod;
            $data['y'] = 0;
        }

        return [
            $data['width'],
            $data['height'],
            $data['x'],
            $data['y'],
        ];
        
    }



    public static function generateSizes(string $path, $data)
    {
        $sizes = config('site.avatar.sizes');
        if (AvatarUploader::disk()->missing($path)) return $data;

        $path = (config('site.avatar.disk') === 'public' || config('site.avatar.disk') === 'local') ? AvatarUploader::disk()->path($path) : AvatarUploader::disk()->url($path);

        foreach ($sizes as $value) {

            $data['sizes'] += static::makeThumb($path, $data, $value);

        }

        return $data;
    }


    public static function makeThumb($path, $data, $blueprint)
    {
        $name = $data['name'].'_'.$blueprint['suffix'];
        $thumbPath = avatar($name . '.' . $blueprint['encode']);

        $image = Image::make($path);

        $image->resize($blueprint['dimension'], $blueprint['dimension'], function ($constraint) {

            $constraint->aspectRatio();
            $constraint->upsize();

        });

        AvatarUploader::disk()->put($thumbPath, (string)$image->encode($blueprint['encode'], 100));

        $thumbData = [
            'name' => $name,
            'extension' => $blueprint['encode'],
            'mime' => $image->mime(),
            'size' => AvatarUploader::disk()->size($thumbPath),
            'dimension' => [
                'width' => $image->width(),
                'height' => $image->height(),
            ],
        ];

        return [
            $thumbData['name'] => $thumbData
        ];


    }
}
