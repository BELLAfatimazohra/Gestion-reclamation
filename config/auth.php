<?php

return [
    'guards' => [
        'client' => [
            'driver' => 'session',
            'provider' => 'clients',
        ],

        'personnel' => [
            'driver' => 'session',
            'provider' => 'personnels',
        ],
    ],

    'providers' => [
        'clients' => [
            'driver' => 'eloquent',
            'model' => App\Models\Client::class,
        ],

        'personnels' => [
            'driver' => 'eloquent',
            'model' => App\Models\Personnel::class,
        ],
    ],


];
