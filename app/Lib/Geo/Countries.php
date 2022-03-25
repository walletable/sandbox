<?php

namespace App\Lib\Geo;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Countries
{


    public $data = [];


    private static $allEndpoint = 'http://api.worldbank.org/v2/country';


    private static $recent;


    public function __construct($data)
    {
        $this->data = $data;
    }

    public static function getFromCache()
    {
        if (static::$recent) return static::$recent;

        $value = Cache::remember('generic.geo.countries', 2628288, function () {

            return static::getFromNetwork();

        });

        return static::$recent = new static($value);
    }


    public static function getFromNetwork()
    {
        $response = Http::get( static::$allEndpoint, [
            'format' => 'json',
            'per_page' => 350
        ]);

        return ( json_decode($response->body()) )[1];
    }


}
