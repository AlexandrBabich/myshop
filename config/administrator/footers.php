<?php

return [
    'title' => 'Footers',
    'single' => 'footer',
    'model' => 'App\Footer',
    'columns' =>[
        'id',
        'active',
        'image' => [
            'output' => '<img src="/uploads/footers/small/(:value)" />'
        ],
    ],
    'edit_fields' => [
        'active' => [
            'type' => 'bool',
        ],
        'col1' => [
            'type' => 'wysiwyg',
        ],
        'col2' => [
            'type' => 'wysiwyg',
        ],
        "image" => [
            'type' => 'image',
            'location' => public_path() . '/uploads/footers/original/',
            'sizes' => [
                [100, 50, 'auto', public_path() . '/uploads/footers/small/', 100],
                [200, 100, 'auto', public_path()  . '/uploads/footers/medium/', 100]
            ],
        ],
    ],
    'form_width' => 500,
];