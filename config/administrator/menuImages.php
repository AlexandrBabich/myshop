<?php

return [
    'title' => 'Menu Image',
    'single' => 'menuImages',
    'model' => 'App\MenuImage',
    'columns' =>[
        'id',
        'active',
        'title',
    ],
    'edit_fields' => [
        'active' => [
            'type' => 'bool',
        ],
        'title' => [
            'type' => 'text',
        ],
        'url' => [
            'type' => 'text',
        ],
        "image" => [
            'type' => 'image',
            'location' => public_path() . '/uploads/menuImages/original/',
            'sizes' => [
                [500, 500, 'auto', public_path()  . '/uploads/menuImages/medium/', 100],
                [100, 100, 'auto', public_path() . '/uploads/menuImages/small/', 100],
            ],
        ],
    ],
    'form_width' => 800,
];