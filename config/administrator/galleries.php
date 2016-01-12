<?php

return [
    'title' => 'Galleries',
    'single' => 'images',
    'model' => 'App\Gallery',
    'columns' =>[
        'id',
        'active',
        'image' => [
            'output' => '<img src="/uploads/images/small/(:value)" />'
        ],
    ],
    'edit_fields' => [
        'project' => [
            'type' => 'relationship',
            'name_field' => 'title',
        ],
        'active' => [
            'type' => 'bool',
        ],
        'weight' => [
            'type' => 'number',
        ],
        'alt' => [
            'type' => 'text',
        ],
        'title' => [
            'type' => 'text',
        ],
        "image" => [
            'type' => 'image',
            'location' => public_path() . '/uploads/images/original/',
            'sizes' => [
                [100, 100, 'auto', public_path() . '/uploads/images/small/', 100],
                [500, 500, 'auto', public_path()  . '/uploads/images/medium/', 100],
                [1000, 800, 'auto', public_path() . '/uploads/images/large/', 100],
            ],
        ],
    ],
];