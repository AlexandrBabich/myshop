<?php

return [
    'title' => 'Products',
    'single' => 'Product',
    'model' => 'App\Products',
    'columns' =>[
        'id',
        'active',
        'title',
        'image' => [
            'output' => '<img src="/uploads/products/small/(:value)" />'
        ],
    ],
    'edit_fields' => [
        'category' => [
            'type' => 'relationship',
            'name_field' => 'title',
        ],
        'title' => [
            'type' => 'text',
        ],
        'active' => [
            'type' => 'bool',
        ],
        'weight' => [
            'type' => 'number',
        ],
        'price' => [
            'type' => 'number',
        ],
        'newPrice' => [
            'type' => 'number',
        ],
        'action' => [
            'type' => 'bool',
        ],
        'shortDescription' => [
            'type' => 'text',
        ],
        'description' => [
            'type' => 'wysiwyg',
        ],
        "image" => [
            'type' => 'image',
            'location' => public_path() . '/uploads/products/original/',
            'sizes' => [
                [100, 100, 'auto', public_path() . '/uploads/products/small/', 100],
                [500, 500, 'auto', public_path()  . '/uploads/products/medium/', 100],
                [800, 800, 'auto', public_path() . '/uploads/products/large/', 100],
            ],
        ],
    ],
    'form_width' => 800,
];