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
    'google' => [
        'client_id' => '199509844985-f84im6ltv4sjl254tnmp9vd7v4pruto3.apps.googleusercontent.com',
        'client_secret' => 'T-TAqDSwwNaSINJ7qIA2VEcd',
        'redirect' => 'http://localhost/auth/google/callback',
    ],
    'telegram-bot-api' => [
        'token' => env('TELEGRAM_BOT_TOKEN', '2023034014:AAHEV53mez0dhU_ovssMQOQ9wVe0t8xsNN0')
    ],

];
