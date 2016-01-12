<?php

return [
    'title' => 'Pages',
    'single' => 'pages',
    'model' => 'App\Pages',
    'columns' =>[
        'id',
        'active',
        'title',
        'slug',
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
        'content' => [
            'type' => 'wysiwyg',
        ],
        "image" => [
            'type' => 'image',
            'location' => public_path() . '/uploads/pages/original/',
            'sizes' => [
                [500, 500, 'auto', public_path()  . '/uploads/pages/medium/', 100],
                [1000, 800, 'auto', public_path() . '/uploads/pages/large/', 100],
            ],
        ],
    ],
    'form_width' => 800,
];