<?php

return [
    'default' => env('FILESYSTEM_DISK', 'local'),

    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],
        'private_materials' => [
            'driver' => 'local',
            'root' => storage_path('app/private_materials'),
            'visibility' => 'private',
            'throw' => false,
        ],
    ],
];
