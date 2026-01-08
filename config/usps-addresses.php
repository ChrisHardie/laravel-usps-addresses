<?php

// config for ChrisHardie/UspsAddresses
return [
    'base_url' => env('USPS_ADDRESSES_BASE_URL', 'https://apis.usps.com/addresses/v3'),

    'oauth' => [
        'token_url' => env('USPS_OAUTH_TOKEN_URL', 'https://apis.usps.com/oauth2/v3/token'),
        'client_id' => env('USPS_CLIENT_ID'),
        'client_secret' => env('USPS_CLIENT_SECRET'),
        'scope' => 'addresses',
    ],

    'timeout' => 10,
];
