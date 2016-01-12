<?php

return [
    'title' => 'Components',
    'single' => 'Component',
    'model' => 'App\Components',
    'columns' =>[
        'id',
        'logotip'=> [
            'output' => '<img src="/uploads/components/small/(:value)" />'
        ],
        'cart'=> [
            'output' => '<img src="/uploads/components/small/(:value)" />'
        ],
    ],
    'edit_fields' => [
        'coutProduct' => [
            'type' => 'text',
        ],

        "logotip" => [
            'type' => 'image',
            'location' => public_path() . '/uploads/components/original/',
            'sizes' => [
                [100, 50, 'auto', public_path() . '/uploads/components/small/', 100],
                [170, 120, 'auto', public_path()  . '/uploads/components/medium/', 100],
                [200, 150, 'auto', public_path() . '/uploads/components/large/', 100],
            ],
        ],
        "cart" => [
            'type' => 'image',
            'location' => public_path() . '/uploads/components/original/',
            'sizes' => [
                [100, 50, 'auto', public_path() . '/uploads/components/small/', 100],
                [200, 100, 'auto', public_path()  . '/uploads/components/medium/', 100],
                [300, 150, 'auto', public_path() . '/uploads/components/large/', 100],
            ],
        ],
    ],
];