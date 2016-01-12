<?php

return [
    'title' => 'OrderItem',
    'single' => 'orderItem',
    'model' => 'App\OrderItem',
    'columns' =>[
        'id',
        'order_id',
        'title',
        'price',
        'count',
    ],
    'edit_fields' => [
        'order' => [
            'type' => 'relationship',
            'name_field' => 'id',
        ],
        'products' => [
            'type' => 'relationship',
            'name_field' => 'id',
        ],
        'title' => [
            'type' => 'text',
        ],
        'price' => [
            'type' => 'number',
        ],
        'count' => [
            'type' => 'number',
        ],
    ],
    'filters' => [
        'order_id',
    ],
];