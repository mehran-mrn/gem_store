<?php

return [
    'default' => 'hiraloa',

    'themes' => [
        'default' => [
            'views_path' => 'resources/themes/default/views',
            'assets_path' => 'public/themes/default/assets',
            'name' => 'Default'
        ],
        'hiraloa' => [
            'views_path' => 'resources/themes/hiraloa/views',
            'assets_path' => 'public/themes/hiraloa/assets',
            'name' => 'Hiraloa'
        ],
        'custom' => [
            'views_path' => 'resources/themes/custom/views',
            'assets_path' => 'public/themes/custom/assets',
            'name' => 'custom'
        ],
        // 'bliss' => [
        //     'views_path' => 'resources/themes/bliss/views',
        //     'assets_path' => 'public/themes/bliss/assets',
        //     'name' => 'Bliss',
        //     'parent' => 'default'
        // ]
    ],


];