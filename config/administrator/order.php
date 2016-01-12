<?php

return [
    'title' => 'Order',
    'single' => 'order',
    'model' => 'App\Order',
    'columns' =>[
        'id',
        'name',
        'number',
        'price',
        'email',
    ],
    'edit_fields' => [
        'name' => [
            'type' => 'text',
        ],
        'email' => [
            'type' => 'text',
        ],
        'number' => [
            'type' => 'text',
        ],
        'price' => [
            'type' => 'text',
        ],
        'address' => [
            'type' => 'text',
        ],
        'info' => [
            'type' => 'textarea',
            'title' => 'Information',
            'limit' => 300, //optional, defaults to no limit
            'height' => 130, //optional, defaults to 100
        ],
        'delivery' => [
            'type' => 'text',
        ],
        'delivery_price' => [
            'type' => 'text',
        ],
        'date' => array(
            'type' => 'datetime',
            'title' => 'date',
            'date_format' => 'yy-mm-dd', //optional, will default to this value
            'time_format' => 'HH:mm',    //optional, will default to this value
        )
    ],

];