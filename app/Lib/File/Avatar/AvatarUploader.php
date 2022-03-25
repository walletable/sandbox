<?php

namespace App\Lib\File\Avatar;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Image;

class AvatarUploader
{
    public static function disk()
    {
        return Storage::disk(config('site.avatar.disk'));
    }

    public function __construct($file){

        $this->file = $file;

    }

    public function store()
    {


        $image = Image::make($this->file);

        $crop = Processor::calculateSquare($image->width(), $image->height());

        $image->crop( ...$crop );

        $data = [
            'name' => Str::uuid(),
            'extension' => 'jpg',
            'mime' => $image->mime(),
            'size' => $this->file->getSize(),
            'dimension' => [
                'width' => $image->width(),
                'height' => $image->height(),
            ],
            'status' => 'pending',
            'sizes' => []
        ];

        $path = avatar($data['name'].'.'.$data['extension']);

        AvatarUploader::disk()->put($path, (string)$image->encode('jpg', config('site.avatar.quality')) );

        $data = Processor::generateSizes($path, $data);

        return $data;
    }


}
