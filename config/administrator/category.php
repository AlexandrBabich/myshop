<?php

return [
    'title' => 'Category',
    'single' => 'category',
    'model' => 'App\Category',
    'columns' =>[
        'id',
        'active',
        'title',
        'image' => [
            'output' => '<img src="/uploads/category/small/(:value)" />'
        ],
    ],
    'edit_fields' => [
        'active' => [
            'type' => 'bool',
        ],
        'title' => [
            'type' => 'text',
        ],
        'slug' => [
            'type' => 'text',
        ],
        "image" => [
            'type' => 'image',
            'location' => public_path() . '/uploads/category/original/',
            'sizes' => [
                [500, 500, 'auto', public_path()  . '/uploads/category/medium/', 100],
                [100, 100, 'auto', public_path() . '/uploads/category/small/', 100],
            ],
        ],
    ],

];