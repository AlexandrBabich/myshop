<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'github' => [
        'client_id' => 'f0638678cc34a771b831',
        'client_secret' => 'ccdbcb0ffedc01ce542cac492152f434bca098aa',
        'redirect' => 'http://life-click.xyz/auth/github/callback',
    ],
    'google' => [
        'client_id' => '921885279833-r2qm525q9d07eo6mhc1csnr8dcrl1835.apps.googleusercontent.com',
        'client_secret' => 'P_1dRbqnV2vkFbFva94ZunFt',
        'redirect' => 'http://life-click.xyz/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '224779764522414',
        'client_secret' => 'f92ab2704bf6fa1141c0e6360cbf0962',
        'redirect' => 'http://life-click.xyz/auth/facebook/callback',
    ],
];
