<?php


namespace App\Lib\File;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Lib\Traits\WorkWithProperties;
use JsonSerializable;

abstract class File implements JsonSerializable
{
    use WorkWithProperties;

    public $name;
    public $extension;
    public $mime;
    public $size;

    public function __construct(array $payload)
    {
        $this->name = $payload['name'];
        $this->extension = $payload['extension'];
        $this->mime = $payload['mime'];
        $this->size = $payload['size'];
    }
    
    public static function disk()
    {
        return Storage::disk(static::storeToDisk());
    }


    public function toArray()
    {
        $data = [
            'url' => $this->url()
        ] + $this->only(
            [
                'extension',
                'mime',
                'size',
            ]
        );

        return $data;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function pointer()
    {
        return $this->name.'.'.$this->extension;
    }

    public function url()
    {
        return static::disk()->url(static::storeTo().$this->pointer());
    }



    public function allData()
    {
        return $this->only(
            [
                'name',
                'extension',
                'mime',
                'size',
            ]
        );
    }



}