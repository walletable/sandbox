<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '1051776465291162',
        'client_secret' => '86dda5054cb52d96c19228219d6fd7ac',
        'redirect' => env('APP_URL').'/social/callback/facebook',
    ],    
    'google' => [
        'client_id' => '819070441518-smdcovhplka1i0m3pctmv41ccfmijc46.apps.googleusercontent.com',
        'client_secret' => 'ifMviSeNpRnoGAgv71zbPuJU',
        'redirect' => env('APP_URL').'/social/callback/google',
    ],

];
