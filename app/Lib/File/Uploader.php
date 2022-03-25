<?php

namespace App\Lib\File;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Uploader
{
    
    public static function disk()
    {
        return Storage::disk(static::storeToDisk());
    }

    public function __construct($file){

        $this->file = $file;

    }

    public function store()
    {

        if ( !$this->file ) return null;

  
        $data = [
            'name' => Str::uuid(),
            'extension' => $this->file->getClientOriginalExtension(),
            'mime' => $this->file->getClientMimeType(),
            'size' => $this->file->getSize(),
        ];

        $this->file->storeAs(static::storeTo(), $data['name'].'.'.$data['extension'], static::storeToDisk());

        return $data;
    }


}
