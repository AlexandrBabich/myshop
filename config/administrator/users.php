<?php

return [
    'title' => 'Users',
    'single' => 'user',
    'model' => 'App\User',
    'columns' =>[
        'id',
        'email',
        'mailing'
    ],
    'edit_fields' => [
        'mailing' => [
            'type' => 'bool',
        ],
        'permission' => [
            'type' => 'bool',
        ],
        'email' => [
            'type' => 'text',
        ]
    ],
    'filters' => [
        'id',
    ],
];