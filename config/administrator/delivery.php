<?php

return [
    'title' => 'Delivery',
    'single' => 'delivery',
    'model' => 'App\Delivery',
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
        'price' => [
            'type' => 'text',
        ],
        'description' => [
            'type' => 'wysiwyg',
        ],

    ],
    'form_width' => 500,
];