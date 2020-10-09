<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'secret' => env('STRIPE_SECRET'),
    ],

//     'paytm-wallet' => [
//         'env' => env('PAYTM_ENVIRONMENT'), // values : (local | production)
//         'merchant_id' => env('PAYTM_MERCHANT_ID'),
//         'merchant_key' => env('PAYTM_MERCHANT_KEY'),
//         'merchant_website' => env('PAYTM_MERCHANT_WEBSITE'),
//         'channel' => env('PAYTM_CHANNEL'),
//         'industry_type' => env('PAYTM_INDUSTRY_TYPE'),
// ],

];
